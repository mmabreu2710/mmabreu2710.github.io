# Challenge "Plumbing" Writeup

## Challenge Description:

The challenge requires handling process data output in real-time to locate the flag. The program outputs a stream of text, and the goal is to capture it and find the hidden flag.

---

## Steps to Solve:

1. **Connect to the Challenge Server**:
   - Use `nc` (netcat) to connect to the server:
     ```
     nc jupiter.challenges.picoctf.org 4427
     ```
   - The server starts outputting a continuous stream of text that is difficult to manually scan in real-time.

   Example of the output:
   ```
   I don't think this is a flag either
   This is definitely not a flag
   Not a flag either
   Again, I really don't think this is a flag
   picoCTF{digital_plumb3r_5ea1fbd7}
   ```

2. **Redirect the Output to a File**:
   - Since the output is lengthy, redirect it to a file for easier searching:
     ```
     nc jupiter.challenges.picoctf.org 4427 > output.txt
     ```

3. **Search for the Flag**:
   - Open the saved `output.txt` file in a text editor or use a command-line search tool (e.g., `grep`) to find the flag:
     ```
     grep "picoCTF" output.txt
     ```

4. **Locate the Flag**:
   - Within the output, locate the line containing the flag:
     ```
     picoCTF{digital_plumb3r_5ea1fbd7}
     ```

---

## Flag:

```
picoCTF{digital_plumb3r_5ea1fbd7}
```
