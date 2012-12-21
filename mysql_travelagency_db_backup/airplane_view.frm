TYPE=VIEW
query=select `travelagency`.`airplanes`.`Id` AS `Id`,`travelagency`.`airplanes`.`Name` AS `AirplaneName`,`travelagency`.`airlines`.`Name` AS `AirlineName`,`travelagency`.`airplanes`.`StartDateOfWork` AS `StartDateOfWork` from (`travelagency`.`airplanes` join `travelagency`.`airlines` on((`travelagency`.`airplanes`.`AirlineId` = `travelagency`.`airlines`.`Id`)))
md5=e561cfb736952d9de4d0eab52ba0bc28
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-12-20 23:30:23
create-version=1
source=SELECT airplanes.Id\n     , airplanes.Name AS AirplaneName\n     , airlines.Name AS AirlineName\n     , airplanes.StartDateOfWork\nFROM\n  airplanes\nINNER JOIN airlines\nON airplanes.AirlineId = airlines.Id
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `travelagency`.`airplanes`.`Id` AS `Id`,`travelagency`.`airplanes`.`Name` AS `AirplaneName`,`travelagency`.`airlines`.`Name` AS `AirlineName`,`travelagency`.`airplanes`.`StartDateOfWork` AS `StartDateOfWork` from (`travelagency`.`airplanes` join `travelagency`.`airlines` on((`travelagency`.`airplanes`.`AirlineId` = `travelagency`.`airlines`.`Id`)))
