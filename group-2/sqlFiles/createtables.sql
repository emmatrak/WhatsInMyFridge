CREATE TABLE deviceList(
	deviceID INT,
	deviceName CHAR(10),
	PRIMARY KEY (deviceID)
);

CREATE TABLE deviceMatch(
	recipeID INT,
	deviceID INT,
	PRIMARY KEY (recipeID, deviceID),
	FOREIGN KEY (deviceID) REFERENCES deviceList(deviceID),
	FOREIGN KEY (recipeID) REFERENCES recipeList(recipeID)
);

CREATE TABLE dietList(
	dietID INT,
	dietName CHAR(20),
	PRIMARY KEY (dietID)
);

CREATE TABLE dietMatch(
	recipeID INT,
	dietID INT,
	PRIMARY KEY (recipeID, dietID),
	FOREIGN KEY (dietID) REFERENCES dietList(dietID),
	FOREIGN KEY (recipeID) REFERENCES recipeList(recipeID)
);
