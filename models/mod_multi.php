<?php
function generatecode(){
    $randomcode = "";
    $alealength = random_int(6,8);
    for ($i=0; $i < $alealength; $i++) { 

       $randomcode .= random_int(0,9);
    };
    return $randomcode;
}

function insertgamedata($code,$id_utilisateur){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare('insert into session_jeu (session_code,creator_id) values (:code, :id_utilisateur)');
    $requete-> execute(
        array(':code' => $code,':id_utilisateur' => $id_utilisateur));
}
function insertplayerdata($pseudo,$id_utilisateur,$id_session_jeu){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare('insert into session_joueur (pseudo, id_utilisateur,id_session_jeu) values (:pseudo,:id_utilisateur,:id_session_jeu)');
    $requete-> execute(
        array(':pseudo'=>$pseudo,':id_utilisateur'=>$id_utilisateur,
    ':id_session_jeu'=>$id_session_jeu));
}
function getgamedata($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select * from session_jeu where session_code = :session_code");
    $requete ->execute(array(':session_code'=>$session_code));
    return $requete -> fetch();
}
function updategamestatus($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("update session_jeu set  status = 'prete' where session_code = :session_code");
    $requete ->execute(array(':session_code'=>$session_code));
   
}


function createduplicatetable(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare(" create table if not exists  duplicate_questions as select id, question from questions "); 
    $requete ->execute() ; 
}
function dropduplicate_questions(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare(" drop table duplicate_questions "); 
    $requete ->execute() ;
}

function addusedcolumn($table){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("alter table {$table} add column used boolean default false");
    $requete ->execute() ; 
}
function verifycolumn($column,$table){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("show columns from {$table} like :column");
    $requete ->execute(array(":column"=>$column)) ; 
    return $requete -> fetch();
}


function getcurrentquestion(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("
    select * from duplicate_questions where used = true ");
    $requete ->execute(); 
    return $requete -> fetch();
}

function deletequestion($id){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("delete  from duplicate_questions where id= :id  "); 
    $requete ->execute(array(":id"=>$id));
    
}
function getquestion(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("
    select * from duplicate_questions  order by rand() limit 1");
    $requete ->execute(); 
    return $requete -> fetch();
}
function updateusedcolumn($id_question){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("
    update duplicate_questions set used = true where id = :id_question");
    $requete ->execute(array(":id_question"=>$id_question));
}

function insertquestions($id_question,$id_session_jeu){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("insert into session_question (id_question, id_session_jeu) 
    value(:id_question, :id_session_jeu)");
    $requete ->execute(array(":id_session_jeu"=>$id_session_jeu,":id_question"=>$id_question)) ;

    updateusedcolumn($id_question);
}

function getpropositions($id_question){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select * from reponse_proposition where id_question = :id_question ");
    $requete ->execute(array(":id_question"=>$id_question)) ;
    return $requete -> fetch();
}

function insertreponse($id_question,$id_reponse_proposition,$id_utilisateur){
 $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("insert into reponse_utilisateur (id_question, id_reponse_proposition, id_utilisateur) values (:id_question, :id_reponse_proposition, :id_utilisateur )");
    $requete ->execute(array(":id_question"=>$id_question,":id_reponse_proposition"=>$id_reponse_proposition,":id_utilisateur"=>$id_utilisateur )) ;
}
function getids($id_question){
   $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare(" select session_question.id as sid, reponse_utilisateur.id as rid  from session_question  join reponse_utilisateur  on session_question.id_question = reponse_utilisateur.id_question  where session_question.id_question = :id_question");
    $requete ->execute(array(":id_question"=>$id_question)) ;
    return $requete -> fetch(); 
}
function insertsessionreponse($id_reponse_utilisateur,$id_session_jeu,$id_session_question){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
       $requete = $db->prepare("insert into session_reponse (id_reponse_utilisateur, id_session_jeu, id_session_question) values (:id_reponse_utilisateur, :id_session_jeu, :id_session_question )");
       $requete ->execute(array(":id_reponse_utilisateur"=>$id_reponse_utilisateur,
       ":id_session_jeu"=>$id_session_jeu, ":id_session_question"=>$id_session_question )) ;
   }
   function getplayerdata($id_session_jeu){
$db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
       $requete = $db->prepare("select  pseudo, sum(points) as scoretotal  from session_joueur where id_session_jeu = :id_session_jeu group by pseudo order by scoretotal  desc ");
       $requete ->execute(array
       (":id_session_jeu"=>$id_session_jeu) );
       return $requete ->fetchAll();
   }
   function getplayersnumbers($id_session_jeu){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
           $requete = $db->prepare("select count(distinct pseudo) as numberofplayers from session_joueur where id_session_jeu = :id_session_jeu");
           $requete ->execute(array
           (":id_session_jeu"=>$id_session_jeu) );
           return $requete ->fetch();
       }
   function insertpoints($pseudo,$id_utilisateur,$id_session_jeu,$points){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
       $requete = $db->prepare("insert into session_joueur (pseudo, id_utilisateur, id_session_jeu, points)values (:pseudo, :id_utilisateur, :id_session_jeu, :points)");
       $requete ->execute(array
       (":pseudo"=>$pseudo,":id_utilisateur"=>$id_utilisateur,
       ":points"=>$points,":id_session_jeu"=>$id_session_jeu) );
   }

   function getbadges($points){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select * from badges where critere_points = 0 or critere_points = :points ");
    $requete ->execute(array(":points"=>$points)
    ) ;
    return $requete ->fetchAll();
   
   };
   function addbadges ($id_badge, $id_utilisateur){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("insert into utilisateurs_badges (id_utilisateur,id_badge) value (:id_utilisateur, :id_badge) ");
    $requete ->execute(array(":id_utilisateur"=>$id_utilisateur,":id_badge"=>$id_badge
    )
    ) ;
    
   }
  function afficherbadges($id_utilisateur){
 $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select b.nom, b.image, b.description 
    from utilisateurs_badges ub
    join badges b ON ub.id_badge = b.id 
    where ub.id_utilisateur = :id_utilisateur ");
    $requete ->execute(array(":id_utilisateur"=>$id_utilisateur));
    return $requete ->fetchAll();
   
   }
   
function addreponsetotalcolumn(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("alter table session_jeu add column reponse_total int default 0");
    $requete ->execute() ; 
}
function addnombrequestioncolumn(){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("alter table session_jeu add column nombre_de_questions int default 1");
    $requete ->execute() ; 
}
function updatereponsetotal($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("update session_jeu set reponse_total = reponse_total + 1 where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ; 
}
function updatenombrequestion($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("update session_jeu set nombre_de_questions = nombre_de_questions + 1 where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ; 
}
function getnombre_de_questions($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select nombre_de_questions from session_jeu where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ;
    return $requete ->fetch()["nombre_de_questions"];
}
function reinitializereponsetotal($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("update session_jeu set reponse_total = 0 where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ; 
}
function reinitializenombrequestion($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("update session_jeu set nombre_de_questions = 1 where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ; 
}
function getansweredplayersnumbers($session_code){
    $db = new PDO ("mysql:host=localhost;dbname=cookify","root","");
    $requete = $db->prepare("select reponse_total from session_jeu where session_code = :session_code");
    $requete ->execute(array(":session_code"=>$session_code)) ;
    return $requete ->fetch(); 
}