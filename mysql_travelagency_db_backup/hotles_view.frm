TYPE=VIEW
query=select `travelagency`.`cities`.`Name` AS `CityName`,`travelagency`.`hotels`.`ID` AS `ID`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`hotels`.`Category` AS `Category` from (`travelagency`.`hotels` join `travelagency`.`cities` on((`travelagency`.`hotels`.`CityId` = `travelagency`.`cities`.`Id`)))
md5=98a59cbf0c75298eb06ccf4411be0faf
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-12-20 02:14:41
create-version=1
source=SELECT `cities`.`Name` AS `CityName`\n	     , `hotels`.`ID` AS `ID`\n	     , `hotels`.`Name` AS `HotelName`\n	     , `hotels`.`Category` AS `Category`\n	FROM\n	  (`hotels`\n	JOIN `cities`\n	ON ((`hotels`.`CityId` = `cities`.`Id`)))
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `travelagency`.`cities`.`Name` AS `CityName`,`travelagency`.`hotels`.`ID` AS `ID`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`hotels`.`Category` AS `Category` from (`travelagency`.`hotels` join `travelagency`.`cities` on((`travelagency`.`hotels`.`CityId` = `travelagency`.`cities`.`Id`)))
