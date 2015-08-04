---
layout: ui
title: DebHook UI
---

# Headers (h1)

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sed quasi excepturi, enim, qui, non dignissimos consectetur dolore optio, numquam hic nihil perferendis aliquid ipsam tempore? Consequatur necessitatibus nisi, cupiditate!

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias eius ad dignissimos ipsam, unde, corporis quod rem qui expedita dolorum fugit. Provident corporis nihil velit accusantium! Doloremque, exercitationem, beatae.

## Header h2
### Header h3
#### Header h4
##### Header h5
###### Header h6


---

## Emphasis

*This text will be italic*
_This will also be italic_

**This text will be bold**
__This will also be bold__

*You **can** combine them*

~~Strikethrough~~

---

## Lists

Sometimes you want numbered lists:

1. One
2. Two
3. Three

Sometimes you want bullet points:

* Start a line with a star
* Profit!

Alternatively,

- Dashes work just as well
- And if you have sub points, put two spaces before the dash or star:
  - Like this
  - And this


---

## Images

If you want to embed images, this is how you do it:

![Alt text](/assets/images/splash-001.jpg "Image title")

---

## Links

http://github.com - automatic!
[GitHub](http://github.com)

---

## Blockquotes

As Kanye West said:

> We're living the future so
> the present is our past.

---

## Inline code

I think you should use an
`<addr>` element here instead.

---

## Syntax highlighting

``` javascript
var iterations = 0;

var findCombinations = function(inputArr, needSum) {
    if (needSum === undefined) needSum = 10;
    var i, num, need, twins, arr = [], result = [];

    for (i = inputArr.length; i--;
        arr[i] = inputArr[i]
    );

    while ((num = arr.pop()) !== undefined) {
        if ((need = needSum - num) && arr.length) {
            for (i = (twins = findCombinations(arr, need)).length; i--;
                twins[i].push(num) && result.push(twins[i])
            );
        }
        for (i = arr.length; i--;
            (arr[i] === need) && result.push([num, arr[i]])
        );
        iterations ++;
    }

    return result;
}
```


You can also simply indent your code by four spaces:

~~~
function jsfiddleTag(args, content){
    var id = args[0];
    var tabs = args[1] && args[1] !== 'default' ? args[1] : 'js,resources,html,css,result';
    var skin = args[2] && args[2] !== 'default' ? args[2] : 'light';
    var width = args[3] && args[3] !== 'default' ? args[3] : '100%';
    var height = args[4] && args[4] !== 'default' ? args[4] : '300';

    return '<iframe width="' + width + '" height="' + height + '" src="http://jsfiddle.net/' + id + '/embedded/' + tabs + '/' + skin + '" frameborder="0" allowfullscreen></iframe>';
}

module.exports = jsfiddleTag;
~~~

---

## Tables

| #    | Label      | Value         |
| :--- | ---------- | ------------: |
| 1    | Temp 1     | 35            |
| 2    | Temp 2     | 41.5          |
| 3    | Power      | 168           |
