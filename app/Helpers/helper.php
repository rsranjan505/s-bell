
<?php

function getEstablishmentType($id){
    if($id!=null){
        if($id == 1){
            return 'Individual';
        }elseif($id == 2){
            return 'LLP';
        }elseif($id == 3){
            return 'OPC';
        }elseif($id == 4){
            return 'Propietorship';
        }elseif($id == 5){
            return 'Partnership';
        }elseif($id == 6){
            return 'Pvt. Ltd.';
        }elseif($id == 7){
            return 'Public Ltd';
        }elseif($id == 8){
            return'Other';
        }
    }
    return null;
}

function getVisitStatus($id){
    if($id!=null){
        if($id == 1){
            return 'Open - Not Contacted';
        }elseif($id == 2){
            return 'Working - Contacted';
        }elseif($id == 3){
            return 'Closed - Converted';
        }elseif($id == 4){
            return'Closed - Not Converted';
        }
    }
    return null;
}
