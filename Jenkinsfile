/* groovylint-disable CompileStatic */
pipeline {
    agent any
    options {
        skipDefaultCheckout()
    }
    stages {
        stage('# Repository Checkout #') {
            steps {
                echo '---> Performing repository checkout'
                checkout([
                    $class: 'GitSCM',
                    branches: [[name: 'jenkins']],
                    userRemoteConfigs: [[url: 'https://github.com/powerclonic/powerclonicv3.git']],
                ])
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
                sh 'docker compose -f docker-compose.prod.yml down'
                sh 'docker rm powerclonic-api powerclonic-frontend -f'
                sh 'docker compose -f docker-compose.prod.yml up --build -d'
                echo '---> Finished restarting docker compose'
            }
        }
        stage('# Run composer install #') {
            steps {
                echo '---> Installing backend dependencies'
                sh 'docker exec powerclonic-api composer install'
                echo '---> Installed all backend dependencies'
            }
        }
    }
}
