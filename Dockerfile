FROM eclipse-temurin:17-jdk-focal

ADD helloWorld-0.0.1-SNAPSHOT.jar helloWorld-0.0.1-SNAPSHOT.jar

ENV TZ=America/New_York
#ENV TZ=EST
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 8080
ENTRYPOINT ["java", "-jar",  "helloWorld-0.0.1-SNAPSHOT"] 
CMD ["iisurl=https://helloworld1.cleverapps.io", "timerurl=https://helloworld1.cleverapps.io", "directpgsqlflag", "mydebugtestflag", "logRemoteDBflag"] 

