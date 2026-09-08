import { cp, mkdir, readdir } from 'node:fs/promises';
import { resolve, basename, extname } from 'node:path';

// Publish only public assets, never the PHP entry point or development files.
const source = resolve('public');
const output = resolve('dist');
await mkdir(output, { recursive: true });
if ((await readdir(output)).length) {
    throw new Error('dist must be empty before building; use a clean checkout.');
}
await cp(source, output, {
    recursive: true,
    filter: (path) => !basename(path).startsWith('.')
        && !['hot', 'storage'].includes(basename(path))
        && !['.php', '.phtml'].includes(extname(path).toLowerCase()),
});
