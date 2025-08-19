### 13 Writeup

#### Challenge Name: 13

---

#### Challenge Description:

We are given the following encoded string:

```
cvpbPGS{abg_gbb_onq_bs_n_ceboyrz}
```

The goal is to decode it.

---

#### Solution:

1. **Identifying the Cipher**:
   - The challenge name "13" hints at the ROT13 cipher, which rotates each letter 13 positions in the alphabet.
   - ROT13 is its own inverse, so applying ROT13 again decodes the text.

2. **Decoding**:
   - Using CyberChef, select the "ROT13" operation and input the encoded string.
   - Decoded output:
     ```
     picoCTF{not_too_bad_of_a_problem}
     ```

---

#### Flag:

```
picoCTF{not_too_bad_of_a_problem}
```
