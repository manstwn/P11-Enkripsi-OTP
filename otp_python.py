def konveersiascii(input_string):
    ascii_values =[]
    for char in input_string:
        ascii_value = ord(char)
        ascii_values.append(ascii_value)
    return ascii_values

def konversibiner(input_string):
    binary_values = []
    for char in input_string:
        binary_value = bin(char)[2:]
        binary_values.append(binary_value)
    return binary_values




def xor_biner(biner1, biner2):
    num1 = int(biner1, 2)
    num2 = int(biner2, 2)
    result = num1 ^ num2
    result_biner = bin(result)[2:]
    return result_biner

def biner_ke_desimal(biner):
    return int(biner, 2)

def kodeascii(ascii_code):
    return chr(ascii_code)

# input_plaintext = input("Masukan PlainText : ")
# input_key = input("Masukan Key : ")

input_plaintext = "RUSDI"
input_key = "CRUSH"

ascii_values_plaintext = konveersiascii(input_plaintext)
ascii_values_key = konveersiascii(input_key)

print("Nilai desimal dari PlainText : ", ascii_values_plaintext)
print("Nilai desimal dari Key : ", ascii_values_key)


hasil_plaintext = konversibiner(ascii_values_plaintext)
hasil_key = konversibiner(ascii_values_key)

print("Nilai biner dari PlainText : ", hasil_plaintext)
print("Nilai biner dari Key : ", hasil_key)


print("=====================Proses Enkripsi=====================")
print("=======Enkripsi Huruf 1")
exor_huruf1 = xor_biner(hasil_plaintext[0], hasil_key[0])
print(exor_huruf1)
desimal_huruf1 = biner_ke_desimal(exor_huruf1)
print(desimal_huruf1)
string_huruf1 = kodeascii(desimal_huruf1)
print(string_huruf1)

print("=======Enkripsi Huruf 2")
exor_huruf2 = xor_biner(hasil_plaintext[1], hasil_key[1])
print(exor_huruf2)
desimal_huruf2 = biner_ke_desimal(exor_huruf2)
print(desimal_huruf2)
string_huruf2 = kodeascii(desimal_huruf2)
print(string_huruf2)

print("=======Enkripsi Huruf 3")
exor_huruf3 = xor_biner(hasil_plaintext[2], hasil_key[2])
print(exor_huruf3)
desimal_huruf3 = biner_ke_desimal(exor_huruf3)
print(desimal_huruf1)
string_huruf3 = kodeascii(desimal_huruf3)
print(string_huruf3)

hasil_biner = (exor_huruf1, exor_huruf2, exor_huruf3)
print("Hasil EXOR PlainText & Key : " , hasil_biner)
hasil_desimal = (desimal_huruf1, desimal_huruf2, desimal_huruf3)
print("Hasil Biner ke Desimal : " , hasil_desimal)
hasil_string = string_huruf1 + string_huruf2 + string_huruf3
print("Hasil Desimal Ke ASCII : " , hasil_string)