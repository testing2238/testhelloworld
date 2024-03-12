FROM java:8-jdk-alpine
#FROM eclipse-temurin:17-jdk-focal

ADD webAPI-0.0.1-SNAPSHOT.jar webAPI-0.0.1-SNAPSHOT.jar

ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 8080
ENTRYPOINT ["java", "-jar",  "webAPI-0.0.1-SNAPSHOT.jar"] 
CMD ["iisurl=https://project002-lhp8ehaz.b4a.run", "timerurl=https://project002-lhp8ehaz.b4a.run", "directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"]  

