function MediaTrend() {
    var self = this;
    this.modal = null;
    this.elm = '';
    this.title = '';
    this.closeText = '';
    this.selectText = '';
    this.callback = null;

    this.select = function(url, fullUrl) {
        url = "/" + url;

        // add val image and view image
        self.elm.val(url);

        // add img
        self.elm.parent('.grid-item-body').find('.item-image').attr('src', fullUrl);

        // hide modal
        self.modal.modal('hide');
        if (self.callback != null) {
            self.callback();
        }
    }

    this.show = function (src, elm, title, closeText, selectText, callback) {

        self.elm = $('#'+elm);
        self.title = title;
        self.closeText = closeText;
        self.selectText = selectText;
        self.callback = callback;

        if (!self.modalHTML) {
            self.createModal();
        }
        $('#trend-media-iframe').attr('src', src);

        self.modal.modal('show');
    };

    this.createModal = function (src) {
        $('<div class="modal modal-danger fade" tabindex="-1" id="trend_manager" role="dialog" data-src="">\
            <div class="modal-dialog" style="width: 70%">\
                <div class="modal-content">\
                    <div class="modal-header aufi-modal-default">\
                        <button type="button" class="close" data-dismiss="modal">\
                            <span aria-hidden="true">&times;</span>\
                        </button>\
                        <h4 class="modal-title">\
                            '+ self.title +'\
                        </h4>\
                    </div> \
                    <div class="modal-body" style="padding:0;padding-right:2px;">\
                        <iframe src="" frameborder="0" width="100%" height="600px"\
                            name="trend-media-iframe" id="trend-media-iframe" style="margin-left:1px"></iframe>\
                    </div>\
                    <div class="modal-footer">\
                        <button type="button" class="btn btn-default float-left" data-dismiss="modal">\
                            '+ self.closeText +'\
                        </button>\
                        <button class="btn-trend-select float-right btn btn-success"> \
                            <i class="icon far fa-folder-open"></i>\
                            '+ self.selectText +'\
                        </button>\
                    </div>\
                </div>\
            </div>\
        </div>').appendTo($('body'));

        self.modal = $('#trend_manager');
    };
}

$(document).ready(function() {

    // open modal image
    $(document).on('click', '.context-tools .change-pic-tool', function(e) {
        var src = $(this).data('src');
        var elm = $(this).data('elm');
        var title = $(this).data('title');
        var closeText = $(this).data('closetext');
        var selectText = $(this).data('selecttext');

        if (typeof window.mediaTrend == "undefined")
            window.mediaTrend = new MediaTrend();

        window.mediaTrend.show(src, elm, title, closeText, selectText, function() {
            $grid.packery();
        });
    });

    $(document).on('click', '.btn-trend-select', function(e) {
        window.frames["trend-media-iframe"].doSelectTrend();
    });
});