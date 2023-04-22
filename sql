o	CREATE TABLE george_condo.reservations (
o	 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
o	 name VARCHAR(255) NOT NULL,
o	  email VARCHAR(255) NOT NULL,
o	  phone VARCHAR(20) NOT NULL,
o	  date DATE NOT NULL,
o	  time TIME NOT NULL,
o	  numPeople INT NOT NULL,
o	  status VARCHAR(20) DEFAULT 'Pending',
o	  confirmed BOOLEAN DEFAULT false,
o	  denied BOOLEAN DEFAULT false
o	);
