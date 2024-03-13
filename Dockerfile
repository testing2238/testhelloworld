FROM eclipse-temurin:17-jdk-focal
ADD webAPI-0.0.1-SNAPSHOT.jar webAPI-0.0.1-SNAPSHOT.jar
ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
EXPOSE 8080
ENTRYPOINT ["java", "-jar",  "webAPI-0.0.1-SNAPSHOT.jar"] 
CMD ["iisurl=https://webapp002-j066x0qx.b4a.run", "timerurl=https://webapp002-j066x0qx.b4a.run", "php_10_pgsqlflag", "mydebugtestflag", "logRemoteDBflag"]