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
  - Gebruik een component waar logisch
  - Gebruik de technieken die aan bod gekomen zijn in de cursus en de oefeningen
    - Control structures
    - XSS protection
    - CSRF protection
    - Client-side validation
- Routes
  - Alle routes gebruiken controller methods
  - Alle routes gebruiken de nodige middleware
  - Indien mogelijk: groepeer je routes
- Controller
  - Gebruik controllers om je logica op te splitsen
  - Denk terug aan resource controllers voor CRUD operaties
- Models
  - Gebruik Eloquent models per entiteit
  - Les de nodige relaties
    - Minstens één one-to-many
    - Optioneel een many-to-many
- Database
  - Ik zal "php artisan migrate:fresh --seed" uitvoeren op elk project en mijn eigen .env-file gebruiken om met de database te connecten
  - Zorg dat je database werkt
  - Zorg dat je database alle nodige basisdata bevat
- Authentication
  - Standaard functionaliteiten
    - Log in/out
    - 'Remember me'
    - Registreer
    - Mogelijkheid om wachtwoord te resetten bij vergeten wachtwoord
- Voeg één default admin toe
    - Username: admin
    - Email: admin@ehb.be
    - Password: Password!321
- Layout
  - Dit is geen design vak dus steek niet teveel tijd in het mooi maken van je project, maar zorg voor een duidelijke en professionele layout
 
# Installatiehandleiding



- Download Visual Studio Code, in het geval dit nog niet gedaan is.
- Aan de linkerkant van het scherm op Visual Studio Code, bevindt zich een vierkant gevuld met vier blokjes:
  - Klik op dat vierkant.
- Voeg de volgende extensies toe op Visual Studio Code om eventuele problemen te vermijden:
  - SQLite Viewer


- Nu is het mogelijk om de functionaliteiten van de website te gebruiken.


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

