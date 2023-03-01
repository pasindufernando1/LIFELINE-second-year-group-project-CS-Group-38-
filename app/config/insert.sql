-- Insert 25 blood banks into the table blood_bank bearing columns BloodBank_Name,Number,LaneName,City,Districy,Province,Email give random emails--
Insert into blood_bank 
    values
    ('Blood Bank 1','No 1','Lane 1','Colombo','Colombo','Western','colombo@gmail.com'),
    ('Blood Bank 2','No 2','Lane 2','Gampaha','Gampaha','Western','gampaha@gmail.com'),
    ('Blood Bank 3','No 3','Lane 3','Kalutara','Kalutara','Western','kalutara@gmail.com'),
    ('Blood Bank 4','No 4','Lane 4','Kandy','Kandy','Central','kandy@gmail.com'),
    ('Blood Bank 5','No 5','Lane 5','Kurunegala','Kurunegala','North Central','kuru@gmail.com'),
    ('Blood Bank 6','No 6','Lane 6','Matale','Matale','Central','matale@gmail.com'),
    ('Blood Bank 7','No 7','Lane 7','Nuwara Eliya','Nuwara Eliya','Central','nuwaraeli@gmail.com'),
    ('Blood Bank 8','No 8','Lane 8','Galle','Galle','Southern','galle@gmail.com'),
    ('Blood Bank 9','No 9','Lane 9','Matara','Matara','Southern','sou@gmail.com'),
    ('Blood Bank 10','No 10','Lane 10','Hambantota','Hambantota','Southern','hamba@gmail.com'),
    ('Blood Bank 11','No 11','Lane 11','Jaffna','Jaffna','Northern','jaffna@gmail.com'),
    ('Blood Bank 12','No 12','Lane 12','Kilinochchi','Kilinochchi','Northern','kili@gmail.com'),
    ('Blood Bank 13','No 13','Lane 13','Mannar','Mannar','Northern','mannar@gmail.com'),
    ('Blood Bank 14','No 14','Lane 14','Mullaitivu','Mullaitivu','Northern','mullaitivu@gmail.com'),
    ('Blood Bank 15','No 15','Lane 15','Vavuniya','Vavuniya','Northern','vavuniya@gmail.com'),
    ('Blood Bank 16','No 16','Lane 16','Puttalam','Puttalam','North Western','puttlam@gmail.com'),
    ('Blood Bank 17','No 17','Lane 17','Kegalle','Kegalle','North Western','kegalle@gmail.com'),
    ('Blood Bank 18','No 18','Lane 18','Anuradhapura','Anuradhapura','North Central','anu@gmail.com'),
    ('Blood Bank 19','No 19','Lane 19','Polonnaruwa','Polonnaruwa','North Central','pol@gmail.com'),
    ('Blood Bank 20','No 20','Lane 20','Trincomalee','Trincomalee','Eastern','trin@gmail.com'),
    ('Blood Bank 21','No 21','Lane 21','Batticaloa','Batticaloa','Eastern','batti@gmail.com'),
    ('Blood Bank 22','No 22','Lane 22','Ampara','Ampara','Eastern','ampara@gmail.com'),
    ('Blood Bank 23','No 23','Lane 23','Badulla','Badulla','Uva','badulla@gmail.com'),
    ('Blood Bank 24','No 24','Lane 24','Monaragala','Monaragala','Uva','monara@gmail.com'),
    ('Blood Bank 25','No 25','Lane 25','Ratnapura','Ratnapura','Sabaragamuwa','ratna@gmail.com');



INSERT into bloodpacket(PacketID,Sub_PacketID,Quantity,Status,TypeID,blood_bank_ID)
	VALUES
    (27,'RBC',100,1,1,14),
    (28,'RBC',100,1,1,15),
    (29,'RBC',100,1,1,16),
    (30,'RBC',100,1,1,17),
    (31,'RBC',100,1,1,18),
    (32,'RBC',100,1,1,19),
    (33,'RBC',100,1,1,20),
    (34,'RBC',100,1,1,21),
    (35,'RBC',100,1,1,22),
    (36,'RBC',100,1,1,23),
    (37,'RBC',100,1,1,24),
    (38,'RBC',100,1,1,25),
    (39,'RBC',100,1,1,26),
    (40,'RBC',100,1,1,27),
    (41,'RBC',100,1,1,28),
    (42,'RBC',100,1,1,29),
    (43,'RBC',100,1,1,30),
    (44,'RBC',100,1,1,31),
    (45,'RBC',100,1,1,32),
    (46,'RBC',100,1,1,33),
    (47,'RBC',100,1,1,34),
    (48,'RBC',100,1,1,35),
    (49,'RBC',100,1,1,36),
    (50,'RBC',100,1,1,37),
    (51,'RBC',100,1,1,38);

INSERT into donor_bloodbank_bloodpacket(DonorID,CampaignID,PacketID,Date)
    VALUES
    (18,14,27,'2023-01-02'),
    (18,15,28,'2023-01-02'),
    (18,16,29,'2023-01-02'),
    (18,17,30,'2023-01-02'),
    (18,18,31,'2023-01-02'),
    (18,19,32,'2023-01-02'),
    (18,20,33,'2023-01-02'),
    (18,21,34,'2023-01-02'),
    (18,22,35,'2023-01-02'),
    (18,23,36,'2023-01-02'),
    (18,24,37,'2023-01-02'),
    (18,25,38,'2023-01-02'),
    (18,26,39,'2023-01-02'),
    (18,27,40,'2023-01-02'),
    (18,28,41,'2023-01-02'),
    (18,29,42,'2023-01-02'),
    (18,30,43,'2023-01-02'),
    (18,31,44,'2023-01-02'),
    (18,32,45,'2023-01-02'),
    (18,33,46,'2023-01-02'),
    (18,34,47,'2023-01-02'),
    (18,35,48,'2023-01-02'),
    (18,36,49,'2023-01-02'),
    (18,37,50,'2023-01-02'),
    (18,38,51,'2023-01-02');


INSERT into bloodpacket(PacketID,Sub_PacketID,Quantity,Status,TypeID,blood_bank_ID)
	VALUES
    (27,'RBC',100,1,1,14),
    (28,'RBC',100,1,1,15),
    (29,'RBC',100,1,1,16),
    (30,'RBC',100,1,1,17),
    (31,'RBC',100,1,1,18),
    (32,'RBC',100,1,1,19),
    (33,'RBC',100,1,1,20),
    (34,'RBC',100,1,1,21),
    (35,'RBC',100,1,1,22),
    (36,'RBC',100,1,1,23),
    (37,'RBC',100,1,1,24),
    (38,'RBC',100,1,1,25),
    (39,'RBC',100,1,1,26),
    (40,'RBC',100,1,1,27),
    (41,'RBC',100,1,1,28),
    (42,'RBC',100,1,1,29),
    (43,'RBC',100,1,1,30),
    (44,'RBC',100,1,1,31),
    (45,'RBC',100,1,1,32),
    (46,'RBC',100,1,1,33),
    (47,'RBC',100,1,1,34),
    (48,'RBC',100,1,1,35),
    (49,'RBC',100,1,1,36),
    (50,'RBC',100,1,1,37),
    (51,'RBC',100,1,1,38);

INSERT into bloodpacket(PacketID,Sub_PacketID,Quantity,Status,TypeID,blood_bank_ID)
values
    (52,'RBC',100,1,1,14),
    (53,'RBC',100,1,1,15),
    (54,'RBC',100,1,1,16),
    (55,'RBC',100,1,1,17),
    (56,'RBC',100,1,1,18),
    (57,'RBC',100,1,1,19),
    (58,'RBC',100,1,1,20),
    (59,'RBC',100,1,1,21),
    (60,'RBC',100,1,1,22),
    (61,'RBC',100,1,1,23),
    (62,'RBC',100,1,1,24),
    (63,'RBC',100,1,1,25),
    (64,'RBC',100,1,1,26),
    (65,'RBC',100,1,1,27),
    (66,'RBC',100,1,1,28),
    (67,'RBC',100,1,1,29),
    (68,'RBC',100,1,1,30),
    (69,'RBC',100,1,1,31),
    (70,'RBC',100,1,1,32),
    (71,'RBC',100,1,1,33),
    (72,'RBC',100,1,1,34),
    (73,'RBC',100,1,1,35),
    (74,'RBC',100,1,1,36),
    (75,'RBC',100,1,1,37),
    (76,'RBC',100,1,1,38);

INSERT INTO `donation_campaign` (`Name`, `Location`, `BedQuantity`, `Date`, `Starting_time`, `Ending_time`, `Number_of_donors`, `AdvertisementID`, `OrganizationUserID`, `Status`, `BloodBankID`) VALUES
('Donate blood Save Lives 1', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 14),
('Donate blood Save Lives 2', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 15),
('Donate blood Save Lives 3', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 16),
('Donate blood Save Lives 4', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 17),
('Donate blood Save Lives 5', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 18),
('Donate blood Save Lives 6', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 19),
('Donate blood Save Lives 7', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 20),
('Donate blood Save Lives 8', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 21),
('Donate blood Save Lives 9', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 22),
('Donate blood Save Lives 10', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 23),
('Donate blood Save Lives 11', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 24),
('Donate blood Save Lives 12', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 25),
('Donate blood Save Lives 13', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 26),
('Donate blood Save Lives 14', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 27),
('Donate blood Save Lives 15', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 28),
('Donate blood Save Lives 16', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 29),
('Donate blood Save Lives 17', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 30),
('Donate blood Save Lives 18', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 31),
('Donate blood Save Lives 19', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 32),
('Donate blood Save Lives 20', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 33),
('Donate blood Save Lives 21', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 34),
('Donate blood Save Lives 22', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 35),
('Donate blood Save Lives 23', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 36),
('Donate blood Save Lives 24', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 37),
('Donate blood Save Lives 25', 'No 12, Galle Rd, Matara', 25, '2023-02-23', '09:00:00', '15:00:00', 500, NULL, 4, 0, 38);


INSERT into bloodpacket(PacketID,Sub_PacketID,Quantity,Status,TypeID,blood_bank_ID)
values
    (77,'RBC',100,1,1,14),
    (78,'RBC',100,1,1,15),
    (79,'RBC',100,1,1,16),
    (80,'RBC',100,1,1,17),
    (81,'RBC',100,1,1,18),
    (82,'RBC',100,1,1,19),
    (83,'RBC',100,1,1,20),
    (84,'RBC',100,1,1,21),
    (85,'RBC',100,1,1,22),
    (86,'RBC',100,1,1,23),
    (87,'RBC',100,1,1,24),
    (88,'RBC',100,1,1,25),
    (89,'RBC',100,1,1,26),
    (90,'RBC',100,1,1,27),
    (91,'RBC',100,1,1,28),
    (92,'RBC',100,1,1,29),
    (93,'RBC',100,1,1,30),
    (94,'RBC',100,1,1,31),
    (95,'RBC',100,1,1,32),
    (96,'RBC',100,1,1,33),
    (97,'RBC',100,1,1,34),
    (98,'RBC',100,1,1,35),
    (99,'RBC',100,1,1,36),
    (100,'RBC',100,1,1,37),
    (101,'RBC',100,1,1,38);

Insert into donor_campaign_bloodpacket(DonorID,CampaignID,PacketID,Date)
VALUES
    (18,20,77,'2023-01-02'),
    (18,21,78,'2023-01-02'),
    (18,22,79,'2023-01-02'),
    (18,23,80,'2023-01-02'),
    (18,24,81,'2023-01-02'),
    (18,25,82,'2023-01-02'),
    (18,26,83,'2023-01-02'),
    (18,27,84,'2023-01-02'),
    (18,28,85,'2023-01-02'),
    (18,29,86,'2023-01-02'),
    (18,30,87,'2023-01-02'),
    (18,31,88,'2023-01-02'),
    (18,32,89,'2023-01-02'),
    (18,33,90,'2023-01-02'),
    (18,34,91,'2023-01-02'),
    (18,35,92,'2023-01-02'),
    (18,36,93,'2023-01-02'),
    (18,37,94,'2023-01-02'),
    (18,38,95,'2023-01-02'),
    (18,39,96,'2023-01-02'),
    (18,40,97,'2023-01-02'),
    (18,41,98,'2023-01-02'),
    (18,42,99,'2023-01-02'),
    (18,43,100,'2023-01-02'),
    (18,44,101,'2023-01-02');
