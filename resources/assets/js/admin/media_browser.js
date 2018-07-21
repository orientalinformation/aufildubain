function MediaBrowser() {
    var self = this;
    this.modal = null;
    this.elm = '';
    this.title = '';
    this.closeText = '';
    this.selectText = '';
    this.multiple = '';

    this.select = function(url, fullUrl) {
        url = "/" + url;

        if (!self.multiple) {

            // add val image and view image
            self.elm.val(url);

            // hide btn add 
            self.elm.parent('div').find(".aufi-btn-add").hide();
        
        } else {
            var images = [];

             try {
                images = JSON.parse(self.elm.val());
            } catch(e) {
                images = [];                
            }

            images.push(url);
            self.elm.val(JSON.stringify(images));
        }

        // add img
        $('<div class="aufi-item-img"> <img src="'+ fullUrl +'">\
            <div class="aufi-remove">\
                <a href="javascript:void(0)" data-url="'+ url +'">\
                    <i class="fa fa-times" aria-hidden="true"></i>\
                </a>\
            </div>\
        </div>').appendTo(self.elm.parent('div').find('.aufi-box-img'));

        // hide modal
        self.modal.modal('hide');
    }

    this.show = function (src, elm, title, closeText, selectText, multiple) {

        self.elm = $('#'+elm);
        self.title = title;
        self.closeText = closeText;
        self.selectText = selectText;
        self.multiple = multiple;

        if (!self.modalHTML) {
            self.createModal();
        }
        $('#media-iframe').attr('src', src);

        self.modal.modal('show');
    };

    this.createModal = function (src) {
        $('<div class="modal modal-danger fade" tabindex="-1" id="media-browser" role="dialog" data-src="">\
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
                            name="media-iframe" id="media-iframe" style="margin-left:1px"></iframe>\
                    </div>\
                    <div class="modal-footer">   \
                        <button type="button" class="btn btn-default float-left" data-dismiss="modal">\
                            '+ self.closeText +'\
                        </button>\
                        <button class="btn-media-select-trend float-right btn btn-success"> \
                            <i class="icon far fa-folder-open"></i>\
                            '+ self.selectText +'\
                        </button>\
                    </div>\
                </div>\
            </div>\
        </div>').appendTo($('body'));

        self.modal = $('#media-browser');
    };

}

$(document).ready(function() {

    // open modal image
    $(document).on('click', '.aufi-btn-add', function(e) {

        var src = $(this).data('src');
        var elm = $(this).data('elm');
        var title = $(this).data('title');
        var closeText = $(this).data('closetext');
        var selectText = $(this).data('selecttext');
        var multiple = $(this).data('multiple');

        if (typeof window.mediaBrowser == "undefined")
            window.mediaBrowser = new MediaBrowser();

        window.mediaBrowser.show(src, elm, title, closeText, selectText, multiple);
    });


    // remove image
    $(document).on('click', '.aufi-remove a', function(e) {
        e.preventDefault();

        var container = $(this).closest('.aufi-box-img').parent().find('.aufi-btn-add'); 
        var multiple = container.data('multiple');
        var elm = $('#' + container.data('elm'));

        if (!multiple) {

            // show btn add 
            container.show();

            // add val image and view image
            elm.val('');
        } else {

            var url = $(this).data('url');
            var images = [];

            try {
                images = JSON.parse(elm.val());
            } catch(e) {
                images = [];                
            }

            var index = images.indexOf(url);
            if (index !== -1) images.splice(index, 1);

            elm.val(JSON.stringify(images));
        }

        // remove img
        $(this).closest('.aufi-item-img').remove();
    });    


    $(document).on('click', '.btn-media-select-trend', function(e) {
        
        window.frames["media-iframe"].doSelect();
    });
});