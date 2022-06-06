<?php
    namespace App\Controllers;

    use App\Models\CharacterModel;
    class MainController extends CoreController{


        public function home(){

            $characterInit = new CharacterModel();
            $allCharacters = $characterInit->findAll();


            $this->show('main/home', [
                'allCharacters' => $allCharacters,
            ]);
        }

        public function newMessage(){

            global $router;

            d($_POST);
            extract($_POST, EXTR_SKIP);

            $errors = [];
            
            if(!isset($nom) ||!isset($description)){
                $errors[] = 'le nom est invalide';
            }

            /* Si le tableau est vide, cela signifie que nous n'avons pas d'erreur, nous vérifions donc avec une condition
            qui vérifie que error est vide, puisque si il est vide, il renverra false*/
            if(!$errors){
                $characterModel = new CharacterModel();
                
                $characterModel->setNom(htmlspecialchars($nom));
                $characterModel->setDescription(htmlspecialchars($description));

                if($characterModel->insert()){
                    $this->home();
                } else {
                    $errors[] = 'Echec lors de L\'enregistrement';
                }
            } 

            
        }

    }