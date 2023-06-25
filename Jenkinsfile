/* groovylint-disable CompileStatic */
pipeline {
    agent any
    stages {
        stage('# Create backup #') {
            steps {
                echo '--> Copying files for backup'
                sh 'sudo cp -r /var/www/powerclonic.xyz /var/www/backup/powerclonic.xyz/'
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
                sh 'sudo cp -r * /var/www/powerclonic.xyz'
                echo '---> Finished copying files'
            }
        }
        stage('# Restart docker compose #') {
            steps {
                echo '---> Restarting docker compose'
                sh 'sudo cd /var/www/powerclonic.xyz'
                sh 'sudo docker compose down'
                sh 'sudo docker compose up --build -d'
                echo '---> Finished restarting docker compose'
            }
        }
    }
    post {
        success {
            stage('# Restart nginx #') {
                steps {
                    echo '---> Restarting nginx'
                    sh 'sudo systemctl restart nginx'
                    echo '---> Restarted nginx'
                }
            }
            stage('# Delete backup files #') {
                steps {
                    echo '---> Deleting backup files'
                    sh 'sudo rm -rf /var/www/backup/powerclonic.xyz'
                    echo '---> Deleted backup files'
                }
            }
        }
        failure {
            stage('# Delete new files #') {
                steps {
                    echo '---> Deleting new files'
                    sh 'sudo rm -r /var/www/powerclonic.xyz/'
                    echo '---> Deleted new files'
                }
            }
            stage('# Restore old files #') {
                steps {
                    echo '---> Restoring old files'
                    sh 'sudo cp -r /var/www/backup/powerclonic.xyz/ /var/www/powerclonic.xyz/'
                    echo '---> Restored old files'
                }
            }
        }
    }
}
