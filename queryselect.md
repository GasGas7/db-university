# 1. Selezionare tutti gli studenti nati nel 1990 (160)
  SELECT * 
  FROM students 
  WHERE YEAR(`date_of_birth`) = 1990 


# 2. Selezionare tutti i corsi che valgono più di 10 crediti (479)

SELECT * 
FROM courses 
WHERE cfu > 10



# 3. Selezionare tutti gli studenti che hanno più di 30 anni

SELECT * 
FROM students 
WHERE YEAR(`date_of_birth`) < 1991 




# 4. Selezionare tutti i corsi del primo semestre del primo anno di un qualsiasi corso di
laurea (286)

SELECT * 
FROM courses 
WHERE year = 1 AND period = "I semestre" 



# 5. Selezionare tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del
20/06/2020 (21)

SELECT * 
FROM exams 
WHERE date(`date`) = "2020-06-20" and time (`hour`) > "14:00:00" `



# 6. Selezionare tutti i corsi di laurea magistrale (38)

SELECT * 
FROM `degrees` 
WHERE level = "magistrale"




# 7. Da quanti dipartimenti è composta l'università? (12)

SELECT * 
FROM departments



# 8. Quanti sono gli insegnanti che non hanno un numero di telefono? (50)
SELECT * 
FROM `teachers` 
WHERE phone IS NULL


<hr>

# GROUP BY:

# 1. Contare quanti iscritti ci sono stati ogni anno:

SELECT COUNT('id'),id 
FROM students 
GROUP BY id

# 2. Contare gli insegnanti che hanno l'ufficio nello stesso edificio:

SELECT COUNT('same_office'), office_number 
FROM teachers 
GROUP BY office_number

# 3. Calcolare la media dei voti di ogni appello d'esame:

SELECT AVG(`vote`), `exam_id` 
FROM `exam_student` 
GROUP BY `exam_id`

# 4. : Contare quanti corsi di laurea ci sono per ogni dipartimento:

SELECT department_id, COUNT('corsi_per_dipartimento') 
FROM degrees 
GROUP BY department_id

<hr>

# JOIN:

# 1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia:
SELECT students.name, students.surname, students.degree_id 
FROM students 
JOIN degrees 
ON students.degree_id = degrees.id 
WHERE degrees.name = 'Corso di Laurea in Economia'

# 2. Selezionare tutti i Corsi di Laurea del Dipartimento di Neuroscienze:

SELECT * 
FROM `courses` 
JOIN departments 
ON departments.id = courses.degree_id 
WHERE departments.id=8

# 3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44):

SELECT * 
FROM course_teacher 
JOIN courses 
ON course_teacher.course_id = courses.id 
WHERE course_teacher.teacher_id = 44

# 4. Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome:
SELECT students.name, students.surname, degree.id as degree_id, degree.name as degree_name, department.id as department_id, department.name as department_name 
FROM students 
JOIN degrees AS degree 
ON degree.id = degree_id 
JOIN departments AS department 
ON department.id = degree_id 
ORDER BY students.name, students.surname ASC
# 5. Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti:

# 6. Selezionare tutti i docenti che insegnano nel Dipartimento di Matematica (54):


