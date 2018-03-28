--- Create a database names students ---
-- Insert the following values into table auth_users --

CREATE TABLE auth_users (
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
f_name VARCHAR(50),
l_name VARCHAR(50),
email VARCHAR(150),
username VARCHAR(25),
password VARCHAR(41)
);

next put into one user 

INSERT INTO auth_users (id,fnameVALUES ('1', 'Ekpono', 'Ambrose', 'ekponoambrose@gmail.com','ekpono', PASSWORD('ekponopassword'));
