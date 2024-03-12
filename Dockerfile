FROM eclipse-temurin:17-jdk-focal
ADD devWebHRV-0.0.1-SNAPSHOT.jar devWebHRV-0.0.1-SNAPSHOT.jar

ENV TZ=America/New_York
#ENV TZ=EST
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 8080
ENTRYPOINT ["java", "-jar",  "devWebHRV-0.0.1-SNAPSHOT.jar"] 
CMD ["iisurl=https://hrvapp.cleverapps.io", "timerurl=https://hrvapp.cleverapps.io","mydebugtestflag"] 
