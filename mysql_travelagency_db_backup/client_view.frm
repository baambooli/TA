TYPE=VIEW
query=select `travelagency`.`clients`.`Name` AS `ClientName`,`travelagency`.`clients`.`Family` AS `Family`,`travelagency`.`clients`.`Address` AS `Address`,`travelagency`.`clients`.`tell` AS `ClientTell`,`travelagency`.`clients`.`PassportNumber` AS `PassportNumber`,`travelagency`.`clients`.`CreditCardType` AS `CreditCardType`,`travelagency`.`clients`.`CreditCardExpiryDate` AS `CreditCardExpiryDate`,`travelagency`.`clients`.`CreditCardHolderName` AS `CreditCardHolderName`,`travelagency`.`clients`.`CreditCardSecurityNumber` AS `CreditCardSecurityNumber`,`travelagency`.`clients`.`CreditCardNumber` AS `CreditCardNumber`,`travelagency`.`room_clients`.`StartDate` AS `StartDate`,`travelagency`.`room_clients`.`EndDate` AS `EndDate`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`hotels`.`Category` AS `Category`,`travelagency`.`rooms`.`RoomNumber` AS `RoomNumber`,`travelagency`.`rooms`.`Tell` AS `RoomTell`,`travelagency`.`roomtypes`.`Name` AS `RoomTypeName`,`travelagency`.`roomtypes`.`PricePerDay` AS `PricePerDay` from ((((`travelagency`.`rooms` join `travelagency`.`roomtypes` on((`travelagency`.`rooms`.`RoomTypeId` = `travelagency`.`roomtypes`.`Id`))) join `travelagency`.`room_clients` on((`travelagency`.`room_clients`.`RoomId` = `travelagency`.`rooms`.`Id`))) join `travelagency`.`clients` on((`travelagency`.`room_clients`.`ClientId` = `travelagency`.`clients`.`Id`))) join `travelagency`.`hotels` on((`travelagency`.`rooms`.`HotelId` = `travelagency`.`hotels`.`ID`)))
md5=55cba682eb4ee534fab6bd013cd0c3a0
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2012-12-20 16:41:30
create-version=1
source=SELECT clients.Name AS ClientName\n     , clients.Family\n     , clients.Address\n     , clients.tell AS ClientTell\n     , clients.PassportNumber\n     , clients.CreditCardType\n     , clients.CreditCardExpiryDate\n     , clients.CreditCardHolderName\n     , clients.CreditCardSecurityNumber\n     , clients.CreditCardNumber\n     , room_clients.StartDate\n     , room_clients.EndDate\n     , hotels.Name AS HotelName\n     , hotels.Category\n     , rooms.RoomNumber\n     , rooms.Tell AS RoomTell\n     , roomtypes.Name AS RoomTypeName\n     , roomtypes.PricePerDay\nFROM\n  rooms\nINNER JOIN roomtypes\nON rooms.RoomTypeId = roomtypes.Id\nINNER JOIN room_clients\nON room_clients.RoomId = rooms.Id\nINNER JOIN clients\nON room_clients.ClientId = clients.Id\nINNER JOIN hotels\nON rooms.HotelId = hotels.ID
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `travelagency`.`clients`.`Name` AS `ClientName`,`travelagency`.`clients`.`Family` AS `Family`,`travelagency`.`clients`.`Address` AS `Address`,`travelagency`.`clients`.`tell` AS `ClientTell`,`travelagency`.`clients`.`PassportNumber` AS `PassportNumber`,`travelagency`.`clients`.`CreditCardType` AS `CreditCardType`,`travelagency`.`clients`.`CreditCardExpiryDate` AS `CreditCardExpiryDate`,`travelagency`.`clients`.`CreditCardHolderName` AS `CreditCardHolderName`,`travelagency`.`clients`.`CreditCardSecurityNumber` AS `CreditCardSecurityNumber`,`travelagency`.`clients`.`CreditCardNumber` AS `CreditCardNumber`,`travelagency`.`room_clients`.`StartDate` AS `StartDate`,`travelagency`.`room_clients`.`EndDate` AS `EndDate`,`travelagency`.`hotels`.`Name` AS `HotelName`,`travelagency`.`hotels`.`Category` AS `Category`,`travelagency`.`rooms`.`RoomNumber` AS `RoomNumber`,`travelagency`.`rooms`.`Tell` AS `RoomTell`,`travelagency`.`roomtypes`.`Name` AS `RoomTypeName`,`travelagency`.`roomtypes`.`PricePerDay` AS `PricePerDay` from ((((`travelagency`.`rooms` join `travelagency`.`roomtypes` on((`travelagency`.`rooms`.`RoomTypeId` = `travelagency`.`roomtypes`.`Id`))) join `travelagency`.`room_clients` on((`travelagency`.`room_clients`.`RoomId` = `travelagency`.`rooms`.`Id`))) join `travelagency`.`clients` on((`travelagency`.`room_clients`.`ClientId` = `travelagency`.`clients`.`Id`))) join `travelagency`.`hotels` on((`travelagency`.`rooms`.`HotelId` = `travelagency`.`hotels`.`ID`)))
