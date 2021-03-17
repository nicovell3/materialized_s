Comming from _s (https://github.com/Automattic/_s)

After `git clone`, these commands where used before the first commit:

```
mv _s materialized_s
cd materialized_s
rm -rf .git
find ./ -type f -exec sed -i -r 's/_s([^A-Za-z])/materialized_s\1/' "{}" \;
find ./ -type f -exec sed -i -r 's/_s$/materialized_s/' "{}" \;
find ./ -type f -exec sed -i -r 's/_S([^A-Za-z])/MATERIALIZED_S\1/' "{}" \;
find ./ -type f -exec sed -i -r 's/_S$/MATERIALIZED_S/' "{}" \;
git init .
git add .
git commit -m 'Forked from _s'
```
