/* groovylint-disable CompileStatic */
pipeline {
    agent any
    stages {
        stage('# Create backup #') {
            steps {
                echo '--> Copying files for backup'
                sh 'mkdir -p /var/www/backup/powerclonic.xyz/'
                sh 'cp -r /var/www/powerclonic.xyz/ /var/www/backup/'
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
                sh 'ls'
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
            sh 'rm -r /var/www/backup/powerclonic.xyz'
            echo '---> Deleted backup files'
        }
        failure {
            echo '---> Deleting new files'
            sh 'find /var/www/powerclonic.xyz/ -not -path "/var/www/powerclonic.xyz/nginx/*" -delete'
            echo '---> Deleted new files'
            echo '---> Restoring old files'
            sh 'cp -r /var/www/backup/powerclonic.xyz/ /var/www/'
            echo '---> Restored old files'
        }
    }
}
