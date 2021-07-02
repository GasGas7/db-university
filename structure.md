# DB UNIVERSITY

## Dipartimenti:
- id_dip                    VARCHAR(50)  PRIMARY KEY UNIQUE  NOTNULL
- address                   VARCHAR(255)    NOTNULL     
- Telefono_segreteria       VARCHAR(15) NOTNULL        
- email_segreteria          VARCHAR(30) NOTNULL
- direttore                 VARCHAR(30) NOTNULL 

# Corsi di Laura:
- id_corsoLaurea
- livello_corso             TINYINT NOTNULL <!-- PRIMO LIVELLO = 1 -SECONDO LV = 2 - MASTER = 3 etc -->
## Corsi:
- id_corso                  VARCHAR(30) PRIMARY KEY UNIQUE NOTNULL 
- descrizione_corso         TEXT NOTNULL
- inizio_lezioni            DATE NULL
- durata_corso              TINYINT NOTNULL
- lingua                    VARCHAR(20) NOTNULL
- obbligo_frequenza         VARCHAR(10) NULL <!-- YES/NO -->
- CFU                       TINYINT NOTNULL
## Docenti:
- id_teacher                VARCHAR(30) PRIMARY KEY UNIQUE NOTNULL
- nome                      VARCHAR(30)     NOTNULL
- cognome                   VARCHAR(30)     NOTNULL
- ufficio                   VARCHAR(30)     NOTNULL
- email                     VARCHAR(30)     NOTNULL
- telefono                  VARCHAR(30)     NOTNULL

## Studenti:
- id_studenti(matricola)    VARCHAR(30) PRIMARY KEY UNIQUE NOTNULL
- nome                      VARCHAR(30)     NOTNULL
- cognome                   VARCHAR(30)     NOTNULL
- luogo_nascita             VARCHAR(30)     NOTNULL
- data_nascita              DATE            NOTNULL
- indirizzo                 VARCHAR(30)     NOTNULL
- email                     VARCHAR(30)     NOTNULL

## Appelli:

- id_esame                  VARCHAR(30) PRIMARY KEY UNIQUE NOTNULL
- data_ora                  DATETIME NOTNULL
- modalita                  VARCHAR(30) NOTNULL
- aula                      VARCHAR(30) NOTNULL

## Registazione Esame:

- id_registrazione          VARCHAR(15) PRIMARY KEY UNIQUE
- esito                     BOOLEAN
- valutazione               TINYINT NULL