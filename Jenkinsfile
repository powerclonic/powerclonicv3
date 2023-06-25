/* groovylint-disable CompileStatic */
pipeline {
    agent any
    stages {
        stage('# Repository Checkout #') {
            steps {
                echo '---> Performing repository checkout'
                checkout([
                    $class: 'GitSCM',
                    branches: [[name: 'jenkins']],
                    userRemoteConfigs: [[url: 'https://github.com/powerclonic/powerclonicv3.git']]])
                echo '---> Finished repository checkout'
            }
        }
        stage('# Copy files #') {
            steps {
                echo '---> Copying files'
                sh 'cp -r * /var/www/powerclonic.xyz'
                echo '---> Finished copying files'
            }
        }
        stage('# Restart docker compose #') {
            steps {
                echo '---> Restarting docker compose'
                sh 'cd /var/www/powerclonic.xyz'
                sh 'docker compose down'
                sh 'docker compose up --build -d'
                echo '---> Finished restarting docker compose'
            }
        }
    }
}
