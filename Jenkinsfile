/* groovylint-disable CompileStatic */
pipeline {
    agent any
    stages {
        stage('# Create backup #') {
            steps {
                echo '--> Copying files for backup'
                sh 'cp -r /var/www/powerclonic.xyz /var/www/backup/powerclonic.xyz/'
                echo '--> Finished files for backup'
            }
        }
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
    post {
        success {
            echo '---> Restarting nginx'
            sh 'systemctl restart nginx'
            echo '---> Restarted nginx'
            echo '---> Deleting backup files'
            sh 'rm -rf /var/www/backup/powerclonic.xyz'
            echo '---> Deleted backup files'
        }
        failure {
            echo '---> Deleting new files'
            sh 'rm -r /var/www/powerclonic.xyz/'
            echo '---> Deleted new files'
            echo '---> Restoring old files'
            sh 'cp -r /var/www/backup/powerclonic.xyz/ /var/www/powerclonic.xyz/'
            echo '---> Restored old files'
        }
    }
}
