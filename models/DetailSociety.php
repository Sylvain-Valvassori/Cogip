<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class DetailSociety extends society{
    
    use $this->Contact;
    use $this->Invoice;
}

