<!DOCTYPE html>
<html>
    <body>
        <div>
            <?php  
                $civility = $infoContact['civility'];
                $firstName = $infoContact['firstName'];
                $name = $infoContact['name'];
                $phone = $infoContact['phone'];
                $address = $infoContact['address'];
                $city = $infoContact['city'];
                $emailInfo = $infoContact['emailInfo'];
                $message = $infoContact['message'];
                $postCode = $infoContact['postCode'];
            ?>
            <div style="font-size: 15px;">
                <p><strong>Civilité :</strong> {{ $civility }}</p>
                <p><strong>Prénom :</strong> {{ $firstName }} </p>
                <p><strong>Nom :</strong> {{ $name }} </p>
                <p><strong>Téléphone :</strong> {{ $phone }} </p>
                <p><strong>Adresse :</strong> {{ $address }} </p>
                <p><strong>Code postal :</strong> {{ $postCode }} </p>
                <p><strong>Ville :</strong> {{ $city }} </p>
                <p><strong>Email :</strong> {{ $emailInfo }} </p>
                <p><strong>Message :</strong></p>
                <p>{!! $message !!}</p>
            </div>
        </div>
    </body>
</html>