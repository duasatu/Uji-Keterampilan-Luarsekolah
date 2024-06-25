<?php
$host = 'tokonyaharis-tokoharis.h.aivencloud.com';
$db = 'defaultdb';
$user = 'avnadmin'; // Change this to your database username
$pass = 'AVNS_yK3pSSUkwfO6KSn6aau'; // Change this to your database password
$port = '25819'; // Change this to your database port

$ssl_cert = <<<EOT
-----BEGIN CERTIFICATE-----
MIIEQTCCAqmgAwIBAgIULjiAWm76bu9/TMIRflHfoFH4XQgwDQYJKoZIhvcNAQEM
BQAwOjE4MDYGA1UEAwwvZmEyMTI0OTItOTgwNi00NTY0LWFkNTQtN2NiMDAwNmQz
NjkzIFByb2plY3QgQ0EwHhcNMjQwNjE4MTczNjQ1WhcNMzQwNjE2MTczNjQ1WjA6
MTgwNgYDVQQDDC9mYTIxMjQ5Mi05ODA2LTQ1NjQtYWQ1NC03Y2IwMDA2ZDM2OTMg
UHJvamVjdCBDQTCCAaIwDQYJKoZIhvcNAQEBBQADggGPADCCAYoCggGBALKXK1js
ngLC0Ir5WR/+93Tj3KUkg+JfIoVms5Fo7F/7kfG3VTle2Zawe0HYb1J0Y37ln4/y
sYiAvSvwLGVXpflNwzRlRBgx6Fi7WlAJWyAaLhCgl0q9+P6zBsiyrTDCUg9fQnYP
3jDtAdKYeA0npmMRhPlQ0rb8fck7lzsdGnyr6yQYdsuY3YlXQHHCgC03IQFLDrVO
kTkqPOZSd6rtGHyCmF4im7I7uHJCIsGQTuuMlgvXtT787Ov+P8ZgpxmQ4nMl/0eE
pt/hU67HlHxbhy/TBtWLYuTFUgh2SEMgpIejOiaHkBXcF6qRkwdopDN5oaBnYqVZ
5WjnjNi3S++ovRw4bymb8XyJk7HkkvL3/wJk72Po52GKlwF2UoZwoeN0d++emcrD
Fd4WsPro98sU5NxNsRxbeyDKbbCxxqPDQGXE4Hm2gnG5l1v2CpM8HgYiB/TMsdc9
RWj9HA8dwBnceUVxapibpe/DYul9SerO7cP3VXNYKKEexOYTOetv47PjrQIDAQAB
oz8wPTAdBgNVHQ4EFgQUZS3xMTf4erjTWQdmuQPdQPlD3xgwDwYDVR0TBAgwBgEB
/wIBADALBgNVHQ8EBAMCAQYwDQYJKoZIhvcNAQEMBQADggGBADmtd0ejQpLmza1c
qFKLJfNlCejl9G30b8PJujoxzlP5B07Lm1NT1IsVxtYuPWXkIqg56tDCG3GtIAGf
Ose9d7XmrqluSqhWLe/j0FoaTeSuv/Dq2tVLS7K6LYpaY565nSG1ZSmPAONDePSB
sAU/p9Rp8PFq3512A1FvHBFLNNVzzo/+Ig8c3oCJknrVrE5KxfsDL00OSJyHBoS4
VlFDdx8utP1XVKliIrOzpuhSGqMBv9CdcimCvuAZN+ykS7N73g9e6VM6+evxYQH9
lgpZuG4IU1u9Xz2M5eSccLgJRP5xnziaxlBy2GrXNV8Il+yDPcCjRGl+8s/b7+ue
VISu6YPJ3qTm6QOlzdJacfQF3FsXyR3pnRMxHI1WdIA1jbCaPvP8RgGsfBwQe3BH
Ow6sM+f9o2SCsUpMm4tpzATpmnMTe9c84MSATiJSJGc4QsmYnsYAkoGWBane/unX
Cgyi8TaR3ESmterblJaUEaMbC9WG6cDmH23O2ySv6vN97b4doQ==
-----END CERTIFICATE-----
EOT;

$dsn = "mysql:host=$host;port=$port;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_SSL_CA       => $ssl_cert, // Set the CA certificate path here
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
