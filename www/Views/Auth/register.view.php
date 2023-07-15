
<style>
        body{
            background-image : url("https://static.vecteezy.com/system/resources/previews/007/164/537/original/fingerprint-identity-sensor-data-protection-system-podium-hologram-blue-light-and-concept-free-vector.jpg")
        }
        .container_register{

        }
        .row_register{
            position: absolute; /* postulat de départ */
            top: 50%; left: 50%; /* à 50%/50% du parent référent */
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            padding: 50px;
           
        }
        h2{
            text-align: center;
            color : #000000;
            
        }
        
    </style>

        <div class="container_register">
            <div class="row_register">
                <h2>S'inscrire</h2>

                <?php $this->partial("form", $form, $formErrors) ?>

            </div>

        </div>



