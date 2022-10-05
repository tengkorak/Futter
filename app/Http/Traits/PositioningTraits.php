<?php
namespace App\Http\Traits;

use App\Attribute;

trait PositioningTraits 
{
	public function generateSlug($string)
	{
		return strtolower(preg_replace(
			['/[^\w\s]+/', '/\s+/'],
			['', '-'],
			$string
		));
    }
    
    public function test(){
        return "lala";
    }

    //return top 2 position for each player
    public function generatePosition()
    {
        
        
        
        $att = auth()->user()->attribute; // calculate satu2 then nanti bawah compare ah return this->generatePosition()

        //aq declare setiap variable baru untuk setiap position sebab tadi aq buat contoh
        //pass asal = 20, calculation untuk defend 20 * 0.3, jadi la 1. something kan , then buat calculation untuk wing dia ambik latest pass = 1. something, sedangkan 
        //aq nak ambik yang asal, so tak nak kacau yg asal aq declare satu2 , calculate kan trus then return, okay tak ?
        $defender="defender";
        $rightWing="rightWing";
        $leftWing="leftWing";
        $striker="striker";

        //Variable Defender
        $passDefender= $att->pass*0.3;
        $defendDefender= $att->defend*0.25;
        $physicalDefender= $att->physical*0.20;
        $dribblingDefender= $att->dribbling*0.10;
        $paceDefender= $att->pace*0.08;
        $shootingDefender= $att->shooting*0.07;

        // Defenders (cdm)
        // 1. Pass 0.3 
        // 2. Defend 0.25 
        // 3. Physical 0.20
        // 4. Dribbling 0.10
        // 5. Pace 0.08
        // 6. Shooting 0.07
        
        $defender= $passDefender + $defendDefender + $physicalDefender + $dribblingDefender + $paceDefender + $shootingDefender;

        //Variable Right Wing
        $dribblingRight= $att->dribbling*0.3;
        $passRight= $att->pass*0.25;
        $paceRight= $att->pace*0.20;
        $shootingRight= $att->shooting*0.15;
        $physicalRight= $att->physical*0.07;
        $defendRight= $att->defend*0.03;
        
        // ni Right Wing
        // 1. Dribble 0.30
        // 2. Pass 0.25 
        // 3. Pace 0.20 
        // 4. Shooting 0.15
        // 5. Physical 0.07
        // 6. Defend 0.03

        //Overall rating * 0.75 if dia left foot
        $rightWing= $passRight + $defendRight + $physicalRight + $dribblingRight + $paceRight + $shootingRight ;
        //kaki kanan = 0, kiri 1
        //if('main_foot'= 1){$rightWing*0.75;}

        //Variable Left Wing
        $dribblingLeft= $att->dribbling*0.3;
        $passLeft= $att->pass*0.25;
        $paceLeft= $att->pace*0.20;
        $shootingLeft= $att->shooting*0.15;
        $physicalLeft= $att->physical*0.07;
        $defendLeft= $att->defend*0.03;

        // Left Wing
        // 1. Dribble 0.30
        // 2. Pass 0.25
        // 3. Pace 0.20
        // 4. Shooting 0.15
        // 5. Physical 0.07
        // 6. Defend 0.03

        //Overall rating * 0.75 if dia right foot

        $leftWing= $passLeft + $defendLeft + $physicalLeft + $dribblingLeft + $paceLeft + $shootingLeft ;
        //if('main_foot'='R'){$leftWing*0.75;}

        //Variable Striker
        $shootingStriker= $att->shooting*0.55;
        $dribblingStriker= $att->dribbling*0.20;
        $paceStriker= $att->pace*0.15;
        $physicalStriker= $att->physical*0.05;
        $passStriker= $att->pass*0.04;
        $defendStriker= $att->defend*0.01;
        
        
        

        // Striker
        // 1. Shooting 0.55
        // 2. Dribble 0.20
        // 3. Pace 0.15
        // 4. Physical 0.05
        // 5. Pass 0.04
        // 6. Defend 0.01

        $striker= $passStriker + $defendStriker + $physicalStriker + $dribblingStriker + $paceStriker + $shootingStriker ;




        //ni calculation untuk defender
        //Akan dapat Overall rating
        
        
        $position = array (
            array("name"=>"defender", "rating"=>$defender), //okay fak aq tak faham ahahahhaha
            array("name"=>"rightWing", "rating"=>$rightWing),
            array("name"=>"leftWing", "rating"=>$leftWing),
            array("name"=>"striker", "rating"=>$striker),
        );
        
        arsort($position);
        //dd($position);
        // $best=array_keys($position,max($position));//max method nk cari paling tinggi niiiii tapi aq tak tahu nk pkai camne
        
        // $value=max($position);
        // $position=array_search($value, $position); //aq rasa okay dah kot ni, hmmm biar dulu ah focus front end lak ah haha

        $top2 = array_slice($position, 0, 2);
        return $top2;
        
        
        //dapatkan user punya attribute then darabkan dgn calculation kau lepastu overall rating tu save. nanti dekat bawah sekali ada compare mana paling tinggi

        //aq nak buat mcm simple if jer 
        //first dia akan calculate attribute tu dgn condition defender = dapat rating untuk defender
        //second dia akan calculate attribute tu dgn condition right wing = dapat rating untuk right wing
        //then carry on smpai striker
        //pstu dia compare kan semua rating tu , tgok yg mana yg paling tinggi
        //then display you should be a striker , based on maximum rating

        //Store dalam array and compare kan semua rating
        //return top 2 positioning & rating

    }

    //Return ratings with descending
    public function returnRatings()
    {
        
        
        
        $att = auth()->user()->attribute; // calculate satu2 then nanti bawah compare ah return this->generatePosition()

        //aq declare setiap variable baru untuk setiap position sebab tadi aq buat contoh
        //pass asal = 20, calculation untuk defend 20 * 0.3, jadi la 1. something kan , then buat calculation untuk wing dia ambik latest pass = 1. something, sedangkan 
        //aq nak ambik yang asal, so tak nak kacau yg asal aq declare satu2 , calculate kan trus then return, okay tak ?
        $defender="defender";
        $rightWing="rightWing";
        $leftWing="leftWing";
        $striker="striker";

        //Variable Defender
        $passDefender= $att->pass*0.3;
        $defendDefender= $att->defend*0.25;
        $physicalDefender= $att->physical*0.20;
        $dribblingDefender= $att->dribbling*0.10;
        $paceDefender= $att->pace*0.08;
        $shootingDefender= $att->shooting*0.07;

        // Defenders (cdm)
        // 1. Pass 0.3 
        // 2. Defend 0.25 
        // 3. Physical 0.20
        // 4. Dribbling 0.10
        // 5. Pace 0.08
        // 6. Shooting 0.07
        
        $defender= $passDefender + $defendDefender + $physicalDefender + $dribblingDefender + $paceDefender + $shootingDefender;

        //Variable Right Wing
        $dribblingRight= $att->dribbling*0.3;
        $passRight= $att->pass*0.25;
        $paceRight= $att->pace*0.20;
        $shootingRight= $att->shooting*0.15;
        $physicalRight= $att->physical*0.07;
        $defendRight= $att->defend*0.03;
        
        // ni Right Wing
        // 1. Dribble 0.30
        // 2. Pass 0.25 
        // 3. Pace 0.20 
        // 4. Shooting 0.15
        // 5. Physical 0.07
        // 6. Defend 0.03

        //Overall rating * 0.75 if dia left foot
        $rightWing= $passRight + $defendRight + $physicalRight + $dribblingRight + $paceRight + $shootingRight ;
        //kaki kanan = 0, kiri 1
        //if('main_foot'= 1){$rightWing*0.75;}

        //Variable Left Wing
        $dribblingLeft= $att->dribbling*0.3;
        $passLeft= $att->pass*0.25;
        $paceLeft= $att->pace*0.20;
        $shootingLeft= $att->shooting*0.15;
        $physicalLeft= $att->physical*0.07;
        $defendLeft= $att->defend*0.03;

        // Left Wing
        // 1. Dribble 0.30
        // 2. Pass 0.25
        // 3. Pace 0.20
        // 4. Shooting 0.15
        // 5. Physical 0.07
        // 6. Defend 0.03

        //Overall rating * 0.75 if dia right foot

        $leftWing= $passLeft + $defendLeft + $physicalLeft + $dribblingLeft + $paceLeft + $shootingLeft ;
        //if('main_foot'='R'){$leftWing*0.75;}

        //Variable Striker
        $shootingStriker= $att->shooting*0.55;
        $dribblingStriker= $att->dribbling*0.20;
        $paceStriker= $att->pace*0.15;
        $physicalStriker= $att->physical*0.05;
        $passStriker= $att->pass*0.04;
        $defendStriker= $att->defend*0.01;
        
        
        

        // Striker
        // 1. Shooting 0.55
        // 2. Dribble 0.20
        // 3. Pace 0.15
        // 4. Physical 0.05
        // 5. Pass 0.04
        // 6. Defend 0.01

        $striker= $passStriker + $defendStriker + $physicalStriker + $dribblingStriker + $paceStriker + $shootingStriker ;


        //Ni store dalam array, tentukan player tu patut main ape
        $position = array (
            array("defender"=>$defender),  
            array("rightWing"=>$rightWing),
            array("leftWing"=>$leftWing),
            array("striker"=>$striker),
        );
        
        arsort($position);
        //dd($position);
        // $best=array_keys($position,max($position));//max method nk cari paling tinggi niiiii tapi aq tak tahu nk pkai camne
        
        // $value=max($position);
        // $position=array_search($value, $position); //aq rasa okay dah kot ni, hmmm biar dulu ah focus front end lak ah haha

        return $position;
        
        
        //dah ada rating setiap position untuk sorang
        //objective, display setiap 

    }

}
?>