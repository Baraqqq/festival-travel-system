# Festival Travel System

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Over het Project

Festival Travel System is een webapplicatie die gebruikers in staat stelt om festivals te ontdekken, reizen te plannen en boekingen te maken. Het systeem biedt functionaliteiten voor verschillende gebruikersrollen, waaronder admin, planner en gewone gebruikers.

## Functionaliteiten

### Gebruikersfunctionaliteiten:
- Registreren en inloggen.
- Festivals bekijken.
- Bussen bekijken.
- Boekingen maken.
- Boekingen bekijken.
- Punten bekijken.

### Plannerfunctionaliteiten:
- Festivals toevoegen.
- Bussen toevoegen.

### Adminfunctionaliteiten:
- Gebruikers beheren.
- Alle plannerfunctionaliteiten.

## Installatie

Volg deze stappen om het project lokaal op te zetten:

1. **Clone de repository:**
    ```sh
    git clone https://github.com/your-username/Festival-Travel-System.git
    cd Festival-Travel-System
    ```

2. **Installeer de afhankelijkheden:**
    ```sh
    composer install
    npm install
    npm run dev
    ```

3. **Kopieer het [.env](http://_vscodecontentref_/1) bestand en configureer de database:**
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Voer de migraties uit:**
    ```sh
    php artisan migrate
    ```

5. **Start de ontwikkelingsserver:**
    ```sh
    php artisan serve
    ```

## Database Schema

Hier is een overzicht van de database tabellen en hun relaties:

### Users Table
- **id:** INT, Primary Key, Auto Increment
- **name:** VARCHAR(255), Not Null
- **email:** VARCHAR(255), Unique, Not Null
- **password:** VARCHAR(255), Not Null
- **role:** ENUM('admin', 'planner', 'user'), Not Null
- **created_at:** TIMESTAMP, Default CURRENT_TIMESTAMP
- **updated_at:** TIMESTAMP, Default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

### Festivals Table
- **id:** INT, Primary Key, Auto Increment
- **naam:** VARCHAR(255), Not Null
- **genre:** VARCHAR(255), Not Null
- **datum:** DATE, Not Null
- **locatie:** VARCHAR(255), Not Null
- **beschrijving:** TEXT, Nullable
- **created_at:** TIMESTAMP, Default CURRENT_TIMESTAMP
- **updated_at:** TIMESTAMP, Default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

### Buses Table
- **id:** INT, Primary Key, Auto Increment
- **naam:** VARCHAR(255), Not Null
- **capaciteit:** INT, Not Null
- **created_at:** TIMESTAMP, Default CURRENT_TIMESTAMP
- **updated_at:** TIMESTAMP, Default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

### Bookings Table
- **id:** INT, Primary Key, Auto Increment
- **user_id:** INT, Foreign Key to Users(id), Not Null
- **festival_id:** INT, Foreign Key to Festivals(id), Not Null
- **bus_id:** INT, Foreign Key to Buses(id), Not Null
- **created_at:** TIMESTAMP, Default CURRENT_TIMESTAMP
- **updated_at:** TIMESTAMP, Default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

### Points Table
- **id:** INT, Primary Key, Auto Increment
- **user_id:** INT, Foreign Key to Users(id), Not Null
- **points:** INT, Not Null
- **created_at:** TIMESTAMP, Default CURRENT_TIMESTAMP
- **updated_at:** TIMESTAMP, Default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

## Testing

### Unit Testing:
- PHPUnit voor het testen van individuele functies en methoden.

### Integration Testing:
- Testen van de interactie tussen verschillende modules en systemen.

### User Acceptance Testing (UAT):
- Testen door eindgebruikers om te verifiëren dat het systeem voldoet aan de vereisten.

## Contributie

Contributies zijn welkom! Volg deze stappen om bij te dragen:

1. Fork de repository.
2. Maak een nieuwe branch (`git checkout -b feature/naam-van-feature`).
3. Commit je wijzigingen (`git commit -am 'Voeg nieuwe feature toe'`).
4. Push naar de branch (`git push origin feature/naam-van-feature`).
5. Open een Pull Request.

## Licentie

Dit project is gelicentieerd onder de MIT-licentie. Zie het LICENSE bestand voor meer informatie.