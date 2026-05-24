# ReviewFlix
Dit project hoort bij het vak "Backend Web".
Het onderwerp van de website is het weergeven van een mening over films en series.

# Functionaliteiten
- Het aanmaken van een account en inloggen (Authentication).
- Onderscheid tussen 'User' en 'Admin'.
- Admin dashboard voor het beheren van gebruikers (rechten verlenen, ontnemen of handmatig aanmaken).
- Een gepersonaliseerde profielpagina met de mogelijkheid om gegevens en een profielfoto aan te passen.
- Het bekijken van de read-only profielen van andere gebruikers door te klikken op hun naam bij een review.
- Het weergeven van de laatste films, series, reviews en nieuwsberichten op de homepagina.
- Het toevoegen, bewerken en verwijderen van nieuwsartikelen inclusief afbeeldingen.
- Een FAQ-pagina waar vragen en antwoorden gegroepeerd per categorie worden weergegeven.
- Het indienen van een contactformulier dat een mail genereert en logt in het systeem.
- Een admin-overzicht om binnengekomen contactberichten in te zien.

# Technische vereisten
- Views
  - Gebruik minstens twee layouts
    - resources/views/layouts/layout.blade.php
    - resources/views/admin/dashboard.blade.php
  - Gebruik een component waar logisch
    - resources/views/components/dropdown.blade.php
  - Gebruik de technieken die aan bod gekomen zijn in de cursus en de oefeningen
    - Control structures: R57-R91,
      - resources/views/pages/home.blade.php
    - XSS protection: R15, R29, R44, R59, R78, R85
      - resources/views/pages/home.blade.php
    - CSRF protection: R9
      - resources/views/admin/news/create.blade.php
    - Client-side validation: R12-R22
      - resources/views/admin/news/create.blade.php
- Routes
  - routes/web.php
    - Alle routes gebruiken controller methods: R15-R50
    - Alle routes gebruiken de nodige middleware: R30
    - Indien mogelijk: groepeer je routes: R35-R50
- Controller
  - Gebruik controllers om je logica op te splitsen
    - MediaController.php
  - Denk terug aan resource controllers voor CRUD operaties: R28-R97
    - app/Http/Controllers/MediaController.php
- Models
  - Gebruik Eloquent models per entiteit
    - app/Models
  - Les de nodige relaties
    - Minstens één one-to-many: R12
      - app/Models/FaqCategory.php
    - Optioneel een many-to-many: R51-R57
      - app/Models/User.php
- Database
  - database/seeders/DatabaseSeeder.php
    - Ik zal "php artisan migrate:fresh --seed" uitvoeren op elk project en mijn eigen .env-file gebruiken om met de database te connecten
    - Zorg dat je database werkt
    - Zorg dat je database alle nodige basisdata bevat: R32-R49
- Authentication
  - Standaard functionaliteiten
    - app/Http/Controllers/Auth
    - resources/views/admin/auth
      - Log in/out:
        - Laravel Breeze (automatisch)
      - 'Remember me':
        - Laravel Breeze (automatisch)
      - Registreer:
        - app/Http/Controllers/Auth/RegisteredUserController
        - resources/views/admin/auth/register.blade.php
      - Mogelijkheid om wachtwoord te resetten bij vergeten wachtwoord:
        - Laravel Breeze (automatisch)
- Voeg één default admin toe: R23-R29
  - database/seeders/DatabaseSeeder.php
    - Username: admin
    - Email: admin@ehb.be
    - Password: Password!321
- Layout
  - public/css/reviewflix.css
    - Dit is geen design vak dus steek niet teveel tijd in het mooi maken van je project, maar zorg voor een duidelijke en professionele layout
 
# Installatiehandleiding
- Zorg ervoor dat Laravel Herd gedownload is en executed is.
- Download Visual Studio Code, in het geval dit nog niet gedaan is.
- Aan de linkerkant van het scherm op Visual Studio Code, bevindt zich een vierkant gevuld met vier blokjes:
  - Klik op dat vierkant.
- Voeg de volgende extensies toe op Visual Studio Code om eventuele problemen te vermijden en de database te kunnen bekijken:
  - SQLite Viewer
- Clone de GitHub Repository:
  - Op Visual Studio Code bevindt zicht een icoontje links in het menu.
  - Het icoontje bestaat uit cirkels die met elkaar verbonden zijn door lijnen.
  - Klik daarop en plak de link van het project daarop om de repository te clonen.
    - Zorg dat de map de naam reviewflix heeft, zodat Laravel Herd deze herkent.
- Open nu de ingebouwde terminal in Visual Studio Code:
  - Via het menu bovenaan: Terminal > New Terminal.
- Voer in de terminal het volgende commando uit om alle benodigde bestanden van Laravel te downloaden:
  - composer install
- Zoek in de projectbestanden naar het bestand genaamd .env.example . 
  - Kopieer dit bestand
  - Plak het en hernoem de kopie naar .env .  
- Voer het volgende commando uit in de terminal om de website te beveiligen met een unieke sleutel:
  - php artisan key:generate
- Voer dit commando uit om data te genereren:
  - php artisan migrate:fresh --seed
- Open vervolgens de browser en typ dit om de website te openen:
  - http://reviewflix.test
- Nu is het mogelijk om de functionaliteiten van de website te gebruiken.
- Om in te loggen met het standaard admin-account, gebruik volgende credentials:
  - Email : admin@ehb.be
  - Password : Password!321

# Screenshots van de applicatie


# Bronnen
- Cursus "Backend Web"; raadpleegbaar via canvas.ehb.be
- Laravel Documentatie: https://laravel.com/docs
- AI-tool: Google Gemini:
  - https://gemini.google.com/share/d9dbbebd0c6e
  - https://gemini.google.com/share/8aaa65df71f7
  - https://gemini.google.com/share/8e212fa4c1bf
  - https://gemini.google.com/share/a66ee319cc55
  - https://gemini.google.com/share/d21aad8ec28e
  - https://gemini.google.com/share/68f204420228
  - https://gemini.google.com/share/b06d2c45c0ba
  - https://gemini.google.com/share/7f3384a800ae


# Sterk Aangeraden Materiaal
- Visual Studio Code
- Laravel Herd en Laravel Breeze
- Extensies op Visual Studio Code:
    - SQLite Viewer