# mockingbird

Backend repo based on the PokeQuiz project. This project deals with creating a Pokédex and having users catch pokemon by answering questions that are pulled from an api called PokeAPI. In this project, a team of five students act as their own particular part of a web based application. The frontend deals with Apache and hold the login, regristration, authentication, and data request files. 
The messing broker is using RabbitMQ to create queues and exchanges between the Ubuntu VMs. The backend holds the database information as well as the neccessary files to communicate to the rest of the team.
The DMZ is meant to pull data from the API and have it send information to the SQL database. And the Logger VM has the job of listening to the other machines and keep track of the errors that occurs on each VM.

This is a work in progress as of Oct 13, 2020. Example code is pulled and edited from the professor to suit the team's needs.
