-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2023-06-17 10:14:04.487

-- tables
-- Table: Comments
CREATE TABLE Comments (
    Comments_id int  NOT NULL  AUTO_INCREMENT,
    Text varchar(100)  NOT NULL,
    Posts_id int  NOT NULL,
    Users_id int  NOT NULL,
    CreationDate date  NOT NULL,
    CONSTRAINT Comments_pk PRIMARY KEY (Comments_id)
);

-- Table: Posts
CREATE TABLE Posts (
    Posts_id int  NOT NULL AUTO_INCREMENT,
    Text varchar(2000)  NOT NULL,
    Users_id int  NOT NULL,
    CreationDate date  NOT NULL,
    CONSTRAINT Posts_pk PRIMARY KEY (Posts_id)
);

-- Table: Users
CREATE TABLE Users (
    Users_id int  NOT NULL AUTO_INCREMENT,
    Login varchar(20)  NOT NULL,
    Password varchar(20)  NOT NULL,
    UserType int  NOT NULL,
    FirstName varchar(20)  NOT NULL,
    LastName varchar(20)  NOT NULL,
    Email varchar(30)  NOT NULL,
    CONSTRAINT Users_pk PRIMARY KEY (Users_id)
);

-- foreign keys
-- Reference: Comments_Posts (table: Comments)
ALTER TABLE Comments ADD CONSTRAINT Comments_Posts FOREIGN KEY Comments_Posts (Posts_id)
    REFERENCES Posts (Posts_id);

-- Reference: Comments_Users (table: Comments)
ALTER TABLE Comments ADD CONSTRAINT Comments_Users FOREIGN KEY Comments_Users (Users_id)
    REFERENCES Users (Users_id);

-- Reference: Posts_Users (table: Posts)
ALTER TABLE Posts ADD CONSTRAINT Posts_Users FOREIGN KEY Posts_Users (Users_id)
    REFERENCES Users (Users_id);

INSERT INTO users (Login, Password, UserType, FirstName, LastName, Email) VALUES ("kdemczyna", "1234qwer", 2, "Kacper", "Demczyna", "kdemczyna@gmail.com");
INSERT INTO users (Login, Password, UserType, FirstName, LastName, Email) VALUES ("Admin", "Admin", 1, "Admin", "Admin", "admin@gmail.com");
INSERT INTO users (Login, Password, UserType, FirstName, LastName, Email) VALUES ("StandardUser", "1234qwer", 0, "Jan", "Kowalski", "jankowal.com");

INSERT INTO posts (Text, Users_id, CreationDate) VALUES ("Podpisy cyfrowe i certyfikaty – jak działają?
Podpis elektroniczny to “cyfrowa pieczęć” uwierzytelniająca informacje, np. wiadomości e-mail, dokumenty Worda czy PDFy. Podpis potwierdza, że przekazywane informacje pochodzą od określonej osoby oraz że treść dokumentu nie była edytowana.
Podpisy elektroniczne występują w dwóch wariantach – zwykłym i kwalifikowanym. Zwykła e-sygnatura jest wizualną reprezentacją odręcznego podpisu, zazwyczaj w formie obrazu, którą możesz wkleić do wybranego dokumentu.
Podpis kwalifikowany (zawierający certyfikat) działa bardzo podobnie, lecz różni się w dwóch kluczowych aspektach: jego autentyczność jest potwierdzona przez urząd certyfikacji oraz posiada moc prawną ręcznego podpisu.
Urząd certyfikacji działa podobnie do kancelarii notarialnej, z tym że zajmuje się wystawianiem, potwierdzaniem i śledzeniem aktywnych oraz wygasłych certyfikatów e-podpisów.", 1, "2023-06-19");

INSERT INTO posts (Text, Users_id, CreationDate) VALUES ("Podpis kwalifikowany w aplikacjach Office. Niewidoczne podpisy cyfrowe są ukryte w metadanych pliku i mogą być używane do potwierdzenia tożsamości nadawcy lub zabezpieczenia dokumentu przed nieautoryzowanymi zmianami. Przed próbą dodania podpisu kwalifikowanego w Word, upewnij się, że jest on zainstalowany na Twoim urządzeniu.
Aby dodać podpis z certyfikatem w programie Word lub innych narzędziach dla firm Microsoft 365, przejdź do zakładki Plik, następnie do karty Informacje. Kliknij Chroń dokument i wybierz z listy Dodaj podpis cyfrowy.", 1 , "2023-06-18");
-- End of file.

