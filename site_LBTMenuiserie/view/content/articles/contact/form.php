<article class="reveal" class="form" > 
    <h2>Demande de devis</h2>
        <form method="post" action="form_answer.php"  enctype="multipart/form-data">
            <div class="contact-form" class="nameForm">
            <label for="name"><p>Votre nom</p></label>
            <input type="text" name="name" id="name" placeholder="Saisissez votre nom" required pattern="^[A-Za-z '-]+$" maxlength="30">
            </div>

            <div class="contact-form" class="firstNameForm">
            <label for="firstName"><p>Votre prénom</p></label>
            <input type="text" name="firstName" id="firstName" placeholder="Saisissez votre prénom" required pattern="^[A-Za-z '-]+$" maxlength="30">
            </div>

            <div class="contact-form"class="emailForm">
            <label for="email"><p>Votre adresse e-mail</p></label>
            <input type="email" name="email" id="email" placeholder="Saisissez votre e-mail" required pattern="^[A-Za-z-.'-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="50">
            </div>

            <div  class="messageForm">
            <label for="message"><p>Votre message</p></label>
            <textarea rows="10" name="message" id="message" placeholder="1000 caractères maximum" required maxlength = "1000"></textarea>
            </div>

            <div  class="tosForm">
            <label for="tos" class="inline-label"><p>J'accepte les <a href="">conditions générales d'utilisation</a></p></label>
            <input type="checkbox" name="tos" id="tos" required>
            </div>

            <div class="contact-form">
            <button type="submit"><p>Transmettre la demande de devis</p></button>
            </div>
        </form>
</article>

