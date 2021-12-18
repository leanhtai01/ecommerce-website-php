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
),
(
  'Vi Tiểu Bảo',
  'vitieubao@yahoo.com',
  '$2y$10$1WLifpk98R5iiqGsoZQ/Zu.R6Uua1vfz2ayW0.0tmUQ9AlykcBmXO',
  '0382876343',
  'Quảng Nam',
  1,
  1
),
(
  'John Doe',
  'johndoe@gmail.com',
  '$2y$10$XTn/WW.KK89pBKpVYKz7uO45PSsFrWd4pPgHtG4KXYa1e2uwaY85m',
  '01234765234',
  'New York',
  1,
  1
),
(
  'Tống Giang',
  'tonggiang@hotmail.com',
  '$2y$10$BGUICuzYHtUeoCYu2Osi0u.I7CGWjjO./4D245gweOhlBcEr0jLTa',
  '0371873923',
  'Lương Sơn',
  1,
  1
),
(
  'Lâm Xung',
  'lamxung@gmail.com',
  '$2y$10$lwIjL/LZFus6EUC8Ez1j1.ArvvW2cvqMobyb/y8xfAgBnqZpI.VFa',
  '0282183823',
  'Dương Châu',
  1,
  1
),
(
  'Lâm Đại Ngọc',
  'lamdaingoc@outlook.com',
  '$2y$10$XhPLwqwey11MVaxqekcS8.eP/77QOkfTbc492ts3YpVpQqe7dc1kG',
  '0123847234',
  'Đài Loan',
  1,
  1
),
(
  'Giả Bảo Ngọc',
  'giabaongoc@gmail.com',
  '$2y$10$GrhbXZoLeSoAos/82j8r5Oev583ZIdugLJUzFgiD8qU4SdoNBW51i',
  '0213287271',
  'Bắc Kinh',
  1,
  1
),
(
  'Yamaha Suzuki',
  'yamahasuzuki@gmail.com',
  '$2y$10$/YxPQa6kqhhqjutgRMqF1.E9G6q81.YihbpxcS89vQuWZohEDD4k2',
  '0231234876',
  'Tokyo',
  1,
  1
),
(
  'Mr. Bean',
  'mrbean@outlook.com',
  '$2y$10$8kT2OwyNRwPu8Y.PbI1jO..06hBxr8l.Gqe.LgMfC6tpDyLRdH/Se',
  '0123428122',
  'London',
  1,
  1
),
(
  'Vũ Thành An',
  'vuthanhan@gmail.com',
  '$2y$10$X5DIW0zdm33m5wAMrqHixOMsYwYeyFQl/xi9qqO528ccacE3oCS5G',
  '0123742642',
  'Đà Nẵng',
  1,
  1
),
(
  'Michael Jackson',
  'michaeljackson@yahoo.com',
  '$2y$10$757ZOJaojRnFRETB5VyWUOMXWsoqymFJqHEO8v7B6sCMKQYAdUjs2',
  '0912328421',
  'Washington DC',
  1,
  1
),
(
  'Michael Schumacher',
  'michaelschumacher@gmail.com',
  '$2y$10$HbLCEGtNEOG2mVwWSeydseRHGE/g0Knok/p/pFwnksYxtV7YE3WeK',
  '0912742123',
  'Virginia',
  1,
  1
),
(
  'Newton',
  'newton@gmail.com',
  '$2y$10$J9oQlg8eey5tNCST0G9Vme7HYUCeyqIx8HMJY47dq.kxRsyx0IBzi',
  '0812342212',
  'Somewhere in the Earth',
  1,
  1
),
(
  'Vũ Văn Thành',
  'vuvanthanh@gmail.com',
  '$2y$10$XjL8Il2Zek3ZAkIsVWHTIutdC15hhk5o1XLmrSeOWYMTQ53OozYUO',
  '0123421821',
  'Hồ Chí Minh',
  1,
  1
),
(
  'Nguyễn Thị Ngọc Như',
  'nguyenthingocnhu@gmail.com',
  '$2y$10$vd8JH1N8AolqcGFyVRILxeKc/BxXVL9OstP3oW6p.tZGGo5Ixpkra',
  '0213842127',
  'Đồng Tháp',
  1,
  1
);
