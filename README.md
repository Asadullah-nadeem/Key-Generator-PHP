# Key Generator PHP

A PHP website that sends user data to a Node.js API to generate and display an API key.

## JavaScript Key Generation Function

The following JavaScript function generates a 32-bit key using the `crypto` API:

```javascript
function generate32BitKey() {
    const array = new Uint8Array(120);  // 120 bytes = 960 bits
    window.crypto.getRandomValues(array);
    return Array.from(array).map(b => b.toString(16).padStart(2, '0')).join('');
}

console.log(generate32BitKey());
```

![image](https://github.com/user-attachments/assets/00d24fe1-2435-45b6-8cbe-d0a03ab6d9c4)

![image](https://github.com/user-attachments/assets/c1adafe6-1afd-45cc-a5bc-4905f89a79d7)
