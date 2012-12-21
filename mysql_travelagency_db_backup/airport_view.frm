TYPE=VIEW
query=select `travelagency`.`airports`.`Id` AS `Id`,`travelagency`.`airports`.`Name` AS `AirportName`,`travelagency`.`airports`.`Address` AS `Address`,`travelagency`.`cities`.`Name` AS `CityName`,`travelagency`.`airports`.`Tel1` AS `Tel1` from (`travelagency`.`airports` join `travelagency`.`cities` on((`travelagency`.`airports`.`CityId` = `travelagency`.`cities`.`Id`)))
md5=12efdb4bae909387f1bef5af3b096c8a
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-12-21 00:43:21
create-version=1
source=SELECT airports.Id\n     , airports.Name AS AirportName\n     , airports.Address\n     , cities.Name AS CityName\n     , airports.Tel1\nFROM\n  airports\nINNER JOIN cities\nON airports.CityId = cities.Id
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `travelagency`.`airports`.`Id` AS `Id`,`travelagency`.`airports`.`Name` AS `AirportName`,`travelagency`.`airports`.`Address` AS `Address`,`travelagency`.`cities`.`Name` AS `CityName`,`travelagency`.`airports`.`Tel1` AS `Tel1` from (`travelagency`.`airports` join `travelagency`.`cities` on((`travelagency`.`airports`.`CityId` = `travelagency`.`cities`.`Id`)))
