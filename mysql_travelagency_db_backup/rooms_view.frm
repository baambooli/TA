TYPE=VIEW
query=select `travelagency`.`rooms`.`Id` AS `Id`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`roomtypes`.`Name` AS `RoomTypeName`,`travelagency`.`rooms`.`RoomNumber` AS `RoomNumber`,`travelagency`.`rooms`.`Tell` AS `Tell` from ((`travelagency`.`rooms` join `travelagency`.`hotels` on((`travelagency`.`rooms`.`HotelId` = `travelagency`.`hotels`.`ID`))) join `travelagency`.`roomtypes` on((`travelagency`.`rooms`.`RoomTypeId` = `travelagency`.`roomtypes`.`Id`)))
md5=6f26ccf22bbc076442e4709e9fd81efe
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-12-20 15:25:18
create-version=1
source=SELECT `rooms`.`Id` AS `Id`\n	     , `hotels`.`Name` AS `HotelName`\n	     , `roomtypes`.`Name` AS `RoomTypeName`\n	     , `rooms`.`RoomNumber` AS `RoomNumber`\n	     , `rooms`.`Tell` AS `Tell`\n	FROM\n	  ((`rooms`\n	JOIN `hotels`\n	ON ((`rooms`.`HotelId` = `hotels`.`ID`)))\n	JOIN `roomtypes`\n	ON ((`rooms`.`RoomTypeId` = `roomtypes`.`Id`)))
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `travelagency`.`rooms`.`Id` AS `Id`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`roomtypes`.`Name` AS `RoomTypeName`,`travelagency`.`rooms`.`RoomNumber` AS `RoomNumber`,`travelagency`.`rooms`.`Tell` AS `Tell` from ((`travelagency`.`rooms` join `travelagency`.`hotels` on((`travelagency`.`rooms`.`HotelId` = `travelagency`.`hotels`.`ID`))) join `travelagency`.`roomtypes` on((`travelagency`.`rooms`.`RoomTypeId` = `travelagency`.`roomtypes`.`Id`)))
