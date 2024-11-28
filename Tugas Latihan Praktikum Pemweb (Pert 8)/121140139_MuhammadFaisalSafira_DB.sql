-- Buat dulu database nya brok (nop or rof)
CREATE DATABASE 121140139_MuhammadFaisalSafira_DB;
USE valo_db;

-- Trus tabel valo_player
CREATE TABLE valo_player (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(100) NOT NULL,
    tim VARCHAR(100) NOT NULL,
    dpi INT NOT NULL,
    profil VARCHAR(255) NOT NULL
);

-- Trus lu insert Data pemain Valorant yang gw kumpulin
INSERT INTO valo_player (nickname, tim, dpi, profil) VALUES
('Tenz', 'Sentinels (retired)', 650, 'https://liquipedia.net/valorant/TenZ'),
('Aspas', 'MIBR', 800, 'https://liquipedia.net/valorant/Aspas'),
('f0rsakeN', 'Paper Rex', 800, 'https://liquipedia.net/valorant/F0rsakeN'),
('Zekken', 'Sentinels', 800, 'https://liquipedia.net/valorant/Zekken'),
('mindfreak', 'Paper Rex', 800, 'https://liquipedia.net/valorant/Mindfreak_(Indonesian_player)'),
('Boaster', 'Fnatic', 400, 'https://liquipedia.net/valorant/Boaster'),
('Boostio', '100 Thieves', 1600, 'https://liquipedia.net/valorant/Boostio'),
('S0mething', 'Paper Rex', 800, 'https://liquipedia.net/valorant/Something'),
('t3xture', 'Gen.G Esports', 800, 'https://liquipedia.net/valorant/T3xture'),
('ZmjjKK', 'EDward Gaming', 1600, 'https://liquipedia.net/valorant/ZmjjKK'),
('Munchkin', 'Gen.G Esports', 800, 'https://liquipedia.net/valorant/Munchkin'),
('Jawgemo', 'G2 Esports', 800, 'https://liquipedia.net/valorant/Jawgemo'),
('Jinggg', 'T1', 1600, 'https://liquipedia.net/valorant/Jinggg'),
('ShahZaM', 'G2 Esports', 800, 'https://liquipedia.net/valorant/ShahZaM'),
('Sacy', 'Sentinels (retired)', 400, 'https://liquipedia.net/valorant/Sacy'),
('Derke', 'Team Vitality', 400, 'https://liquipedia.net/valorant/Derke'),
('Xccurate', 'T1', 800, 'https://liquipedia.net/valorant/Xccurate');
