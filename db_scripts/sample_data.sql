-- File: sample_data.sql
-- Add sample data to database ecommerce_db
-- Author: 1760169 - Lê Anh Tài
-- Email: leanhtai01@gmail.com
-- GitHub: https://github.com/leanhtai01/leanhtai01-ecommerce
USE ecommerce_db;

INSERT INTO accounts
(
  fullname,
  email,
  password,
  phone_number,
  address,
  role_id,
  is_verified
)
VALUES
(
  'Administrator',
  'admin@gmail.com',
  '$2y$10$U9QcNd2ZwGTGZJaGdkOa8eddzpo5b5LCf.8.rj73lyDNxS4Ca1wAe',
  '0123123123',
  'Hồ Chí Minh',
  0,
  1
),
(
  'Lê Anh Tài',
  'leanhtai01@gmail.com',
  '$2y$10$T53Iga0pUToao7ntMk9WnuKGpYLNW2/HW3AVklyctZ939v90KuWni',
  '0357011672',
  'Bình Phước',
  1,
  0
),
(
  'Nguyễn Văn Linh',
  'nguyenvanlinh@gmail.com',
  '$2y$10$tHcsXUZjQcGbF.H2Fm67muohyCVaiRBkSq3wsifQuRaOvb2UwjEjO',
  '0823712465',
  'Hà Nội',
  1,
  1
),
(
  'Trần Văn Mạnh',
  'tranvanmanh@yahoo.com',
  '$2y$10$E5f3qkKgIK19JluRhKvTNuyA6PbzIoSQbh1/rxbDihkMYoHDqsXHC',
  '0978654313',
  'Hải Phòng',
  1,
  1
),
(
  'Lê Anh Tài',
  'leanhtai01@yahoo.com.vn',
  '$2y$10$maKdbibcObGgiiav0t/lSOO74JjWi8Sp.5M/XspqS4c7Sgh9cJEOa',
  '0522491642',
  'Thừa Thiên Huế',
  1,
  0
),
(
  'Phan Thị Ngọc',
  'phanthingoc@outlook.com',
  '$2y$10$MJENqTTAIvAR2cwQ7AL0n.OaACCA9nB3E69mUA/vUD1PkAAJupac.',
  '0237243234',
  'Quảng Trị',
  1,
  1
),
(
  'Võ Tòng',
  'votong@yahoo.com.vn',
  '$2y$10$NfFW3m3FHxNS5aGwJn/ApenQzwa47cPQvs6vCN.WImA9cHphyVDf.',
  '0123434234',
  'Lương Sơn',
  1,
  1
),
(
  'Trần Văn Bình',
  'tranvanbinh@hotmail.com',
  '$2y$10$45fkcKhtddEZAEl25gveOujy5XAYprG2gqJZaVBcbabiXiecwJvp.',
  '0913456789',
  'Bến Tre',
  1,
  1
),
(
  'Lý Văn Tèo',
  'lyvanteo@gmail.com',
  '$2y$10$vyD5MPabI9vi71QWaiIcLOnfDmYTBiDOT8gUwAPROme44bzX7wKzi',
  '0987231234',
  'Tây Ninh',
  1,
  1
),
(
  'Nguyễn Thành Đạt',
  'nguyenthanhdat@gmail.com',
  '$2y$10$7669OYmUJ09FPxtHBNZm0exPk0TuTCTFmBcHYR10sBDQ57TCSs4OG',
  '0218322123',
  'Bắc Giang',
  1,
  1
),
(
  'Phan Văn Đức',
  'phanvanduc@gmail.com',
  '$2y$10$0Zl4CEnjFNSLGhDGcn3qF.lews9SOQS4GkfJ7qj0u53phgZapyCei',
  '0672654234',
  'Bình Thuận',
  1,
  1
),
(
  'Kim Dung',
  'kimdung@gmail.com',
  '$2y$10$ji2aJVOEe2QmSGajdzzTzuBx7v4Dpwa9ljJEhv21rgpiUpmgUjFq6',
  '0345678765',
  'Nha Trang',
  1,
  1
);

