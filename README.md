
<h1 align="center">
    <img alt="Jonathan's" src="https://i.pinimg.com/originals/52/1a/fa/521afaada5d1c270249703e2420fbbb3.png" />
    <br>
    Processor files .dat - Lumen PHP
</h1>

<p align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/JonathansMoon/processordat">

  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/JonathansMoon/processordat">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/JonathansMoon/processordat">
  <a href="https://github.com/JonathansMoon/processordat/commits/master">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/JonathansMoon/processordat">
  </a>

  <a href="https://github.com/JonathansMoon/processordat/issues">
    <img alt="Repository issues" src="https://img.shields.io/github/issues/JonathansMoon/processordat.svg">
  </a>

<p align="center">
  <a href="#Moon-technologies">Technologies</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#information_source-how-to-use">How To Use</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#memo-license">License</a>
</p>

## :computer: Technologies

This project was developed at the [Jonathan's Moon](#) with the following technologies:

-  [Lumen](https://lumen.laravel.com/docs/8.x)
-  [PHPUnit](https://phpunit.de/)

## :information_source: How To Use

To clone and run this application, you'll only need [Docker](https://www.docker.com/) installed on your computer. From your command line:

```bash
# Clone this repository
$ git clone https://github.com/JonathansMoon/processordat.git

# Go into the repository
$ cd processordat

# Change the access permissions of the run.sh file
$ chmod +x ./run.sh

# Run the command to mount the php and nginx image on the docker
# This will automatically perform the migrations and seeds, 
# in addition to configuring and running your project via docker.
$ sudo ./run.sh

# To run the tests run
$ ./vendor/bin/phpunit

```
## :information_source: Technologies used
Jobs were used to process queues, phpunit for testing and design pattern services

## :information_source: How to run
Examples of hosts configured by default in run.sh, but you can modify them.
To run the app go to: http://localhost:8003/

## :information_source: Important
The application fetches the .dat files within the storage/app/public/ in folder and generates the reports within storage/app/public/out

## :memo: License
This project is under the MIT license.

Made with ♥ by Jonathan Silva :wave: [Get in touch!](https://www.linkedin.com/in/jonathan-silva-gomes-53271a168/)

[vc]: https://code.visualstudio.com/
