
CREATE DATABASE IF NOT EXISTS f1_hub;
USE f1_hub;

-- Teams Table
CREATE TABLE IF NOT EXISTS teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    full_name VARCHAR(200),
    base VARCHAR(100),
    team_principal VARCHAR(100),
    championships INT DEFAULT 0,
    color VARCHAR(10)
);

-- Drivers Table
CREATE TABLE IF NOT EXISTS drivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_id INT,
    name VARCHAR(100) NOT NULL,
    nationality VARCHAR(50),
    number INT,
    championships INT DEFAULT 0,
    wins INT DEFAULT 0,
    points INT DEFAULT 0,
    FOREIGN KEY (team_id) REFERENCES teams(id)
);


-- Insert Teams
INSERT INTO teams (name, full_name, base, team_principal, championships, color) VALUES
('Red Bull Racing', 'Oracle Red Bull Racing', 'Milton Keynes, UK', 'Christian Horner', 6, '#3671C6'),
('Ferrari', 'Scuderia Ferrari HP', 'Maranello, Italy', 'Frédéric Vasseur', 16, '#E8002D'),
('Mercedes', 'Mercedes-AMG Petronas F1 Team', 'Brackley, UK', 'Toto Wolff', 8, '#27F4D2'),
('McLaren', 'McLaren F1 Team', 'Woking, UK', 'Andrea Stella', 9, '#FF8000'),
('Aston Martin', 'Aston Martin Aramco F1 Team', 'Silverstone, UK', 'Mike Krack', 0, '#229971'),
('Alpine', 'BWT Alpine F1 Team', 'Enstone, UK', 'Oliver Oakes', 2, '#FF87BC'),
('Williams', 'Williams Racing', 'Grove, UK', 'James Vowles', 7, '#64C4FF'),
('RB', 'Visa Cash App RB F1 Team', 'Faenza, Italy', 'Laurent Mekies', 0, '#6692FF'),
('Haas', 'MoneyGram Haas F1 Team', 'Kannapolis, USA', 'Ayao Komatsu', 0, '#B6BABD'),
('Sauber', 'Stake F1 Team Kick Sauber', 'Hinwil, Switzerland', 'Jonathan Wheatley', 0, '#52E252');

-- Insert Drivers
INSERT INTO drivers (team_id, name, nationality, number, championships, wins, points) VALUES
(1, 'Max Verstappen', 'Dutch', 1, 4, 62, 575),
(1, 'Sergio Perez', 'Mexican', 11, 0, 13, 152),
(2, 'Charles Leclerc', 'Monégasque', 16, 0, 8, 206),
(2, 'Carlos Sainz', 'Spanish', 55, 0, 4, 200),
(3, 'Lewis Hamilton', 'British', 44, 7, 103, 190),
(3, 'George Russell', 'British', 63, 0, 2, 175),
(4, 'Lando Norris', 'British', 4, 0, 3, 310),
(4, 'Oscar Piastri', 'Australian', 81, 0, 2, 262),
(5, 'Fernando Alonso', 'Spanish', 14, 2, 32, 86),
(5, 'Lance Stroll', 'Canadian', 18, 0, 0, 24),
(6, 'Esteban Ocon', 'French', 31, 0, 1, 23),
(6, 'Pierre Gasly', 'French', 10, 0, 1, 8),
(7, 'Alex Albon', 'Thai', 23, 0, 0, 12),
(7, 'Logan Sargeant', 'American', 2, 0, 0, 1),
(8, 'Yuki Tsunoda', 'Japanese', 22, 0, 0, 22),
(8, 'Daniel Ricciardo', 'Australian', 3, 0, 8, 6),
(9, 'Nico Hulkenberg', 'German', 27, 0, 0, 31),
(9, 'Kevin Magnussen', 'Danish', 20, 0, 0, 16),
(10, 'Valtteri Bottas', 'Finnish', 77, 0, 10, 5),
(10, 'Zhou Guanyu', 'Chinese', 24, 0, 0, 6);
