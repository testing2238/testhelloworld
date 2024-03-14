FROM eclipse-temurin:17-jdk-focal
ADD webAPI-0.0.1-SNAPSHOT.jar webAPI-0.0.1-SNAPSHOT.jar
ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
EXPOSE 8080
ENTRYPOINT ["java", "-jar",  "webAPI-0.0.1-SNAPSHOT.jar"] 
#CMD ["iisurl=https://webapp003-5zp49yka.b4a.run", "timerurl=https://webapp003-5zp49yka.b4a.run", "php_10_pgsqlflag", "mydebugtestflag", "logRemoteDBflag"]
CMD ["iisurl=https://webapp0021-eh9ysyvk.b4a.run", "timerurl=https://webapp0021-eh9ysyvk.b4a.run", "directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"]
