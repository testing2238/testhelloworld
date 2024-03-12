FROM maven:3.8.3-openjdk-11-slim AS build
WORKDIR /app
COPY . .
RUN mvn clean package -DskipTests

FROM openjdk:11-jre-slim
COPY --from=build webAPI-0.0.1-SNAPSHOT.jar /webAPI-0.0.1-SNAPSHOT.jar
ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
EXPOSE 8080
CMD ["java", "-jar", "/webAPI-0.0.1-SNAPSHOT.jar"]
CMD ["iisurl=https://project0011-gubi8k7j.b4a.run", "timerurl=https://project0011-gubi8k7j.b4a.run", "directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"]  


#FROM eclipse-temurin:17-jdk-focal
#ADD webAPI-0.0.1-SNAPSHOT.jar webAPI-0.0.1-SNAPSHOT.jar
#ENV TZ=America/New_York
#RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
#EXPOSE 8080
#ENTRYPOINT ["java", "-jar",  "webAPI-0.0.1-SNAPSHOT.jar"] 
#CMD ["iisurl=https://project0011-gubi8k7j.b4a.run", "timerurl=https://project0011-gubi8k7j.b4a.run", "directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"]  
#CMD ["directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"]