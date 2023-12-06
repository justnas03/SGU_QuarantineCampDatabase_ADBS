import mysql.connector
from faker import Faker
from datetime import datetime, timedelta
import random

# Kết nối đến cơ sở dữ liệu MySQL
connection = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="dbtest2"
)
cursor = connection.cursor()

# Sử dụng thư viện faker để tạo dữ liệu ngẫu nhiên
fake = Faker()

# Số lượng bản ghi cần thêm vào
num_records = 500000

for _ in range(num_records):
    # Tạo dữ liệu ngẫu nhiên
    MaBN = fake.random_int(min=1, max=999999)
    HoTen = fake.name()
    SoCMND = fake.random_int(min=100000000000, max=999999999999)
    SDT = fake.random_int(min=1000000000, max=9999999999)
    DiaChi = fake.address()
    Gioitinh = random.choice(['M', 'F'])
    chuyendentu = fake.address()
    thongtinxnbandau = fake.text()
    Ma_Staff = fake.random_int(min=1, max=999999)
    Ngay_nhap_vien = fake.date_time_between(start_date="-365d", end_date="now")
    Ngay_xuat_vien = Ngay_nhap_vien + timedelta(days=random.randint(1, 30))
    Ma_Nurse = fake.random_int(min=1, max=999999)

    # Câu truy vấn INSERT
    sql = f"INSERT INTO BENHNHAN (MaBN, HoTen, SoCMND, SDT, DiaChi, Gioitinh, chuyendentu, thongtinxnbandau, Ma_Staff, Ngay_nhap_vien, Ngay_xuat_vien, Ma_Nurse) VALUES ({MaBN}, '{HoTen}', '{SoCMND}', '{SDT}', '{DiaChi}', '{Gioitinh}', '{chuyendentu}', '{thongtinxnbandau}', {Ma_Staff}, '{Ngay_nhap_vien}', '{Ngay_xuat_vien}', {Ma_Nurse})"

    # Thực thi câu truy vấn
    cursor.execute(sql)

# Lưu thay đổi vào cơ sở dữ liệu
connection.commit()

# Đóng kết nối
cursor.close()
connection.close()
