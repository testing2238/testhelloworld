A simple web site template based on PHP. Features:
* Routing scheme: domain.com/<route>
* 404 mapping
* Basic structure including CSS and JavaScript
* Authentication with name/email and password
* Can be used without database

docker build -t eddyko00/ek-dev .
docker push eddyko00/ek-dev
docker run --name phpapi  -d -p 80:80 eddyko00/ek-dev

