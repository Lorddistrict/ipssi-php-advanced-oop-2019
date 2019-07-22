# ipssi-php-advanced-oop-2019 - Setup

**Table of Contents**

**[Docker](#docker)**<br>
**[Start](#start)**<br>
**[Files](#files)**<br>
**[Git](#git)**<br>
**[Command](#command)**<br>
**[Makefile](#makefile)**<br>
**[Commands available](#commands-available)**<br>
**[CircleCI](#circleci)**<br>
**[Mailhog](#mailhog)**<br>
**[Errors](#errors)**<br>
**[Required](#required)**<br>
**[How does it works ?](#how-the-project-works-?)**<br>

----

# Start the project

## Docker

### Start
To start the project you need to have <abbr title="https://docs.docker.com/install/">docker</abbr>, <abbr title="https://docs.docker.com/compose/install/">docker-compose</abbr> and <abbr title="https://getcomposer.org/">composer</abbr> installed.
However you can clone and edit the **docker-compose** file in order running your own containers.

### Files
Once you run the project, a **docker-compose.override.yml** will be created.

Complete the ports into **docker-compose.override.yml** with your own. (ex: 8080)


## Git
### Command

`$ git clone https://github.com/Lorddistrict/ipssi-php-advanced-oop-2019.git`

----

## Makefile
### Commands available

**Start the project & all containers**

`make start`

**Enter the php container**

`make exec`

----

## How the project works ?

This project has no goal and is full of "don't do it !" things. I'm going to improve the quality soon but i got a day to render it. Thanks for reading :)
See ya'

Lorddistrict

----

**Project by**
Etienne Crespi
