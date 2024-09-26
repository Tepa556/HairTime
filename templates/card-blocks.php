<?php 
echo '<div class="container-lg our-offer" id="offer">  
    <h2 class="text-secondary">' . $heading . '</h2>  
    <div class="container text-center">  
        <div class="row">'; 

        if($heading=='Что мы предлогаем'){ 
            $services = [ 
                "Окрашивание волос", 
                "SPA-процедуры", 
                "Массаж", 
                "Брови/Ресницы", 
                "Косметолог", 
                "Nail сервис" 
            ]; 
            $i = 0; 
            foreach ($services as $service):  
                echo '<div class="col p-2 d-flex justify-content-center">'; 
                echo '<div class="my-card" style="background-image: url(\'./image/Фон карточек услуг.png\'); cursor: pointer;" onclick="redirectToService(\'' . htmlspecialchars($service) . '\')">  
                    <p>' . $service . '</p>  
                </div>  
            </div>';  
            $i++;
            if ($i == 3) {
                echo '</div><div class="row">'; 
            }
            endforeach;  
        } else { 
            $services = [ 
                "Классический боб", 
                "Пикси", 
                "Лонг боб", 
                "Каскад", 
                "Андеркат", 
                "Градуированное каре" 
            ]; 
            $i = 0;
            foreach ($services as $service):  
                echo '<div class="col p-2 d-flex justify-content-center">'; 
                   echo '<div class="my-card" style="background-image: url(\'./image/Стрижки.png\'); cursor: pointer;" onclick="redirectToService(\'' . htmlspecialchars($service) . '\')">   
                    <p>' . $service . '</p>  
                </div>  
            </div>';  
            $i++;
            if ($i == 3) { 
                echo '</div><div class="row">'; 
            }
            endforeach;  
        } 

echo '   </div> 
    </div> 
</div>'; 
?>
