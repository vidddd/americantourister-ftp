
            <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <tbody>

                <?php foreach($dirArray as $name => $fileInfo): ?>
                    <tr><td data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>">
                        <a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>">

                                <span class="file-name">
                                    <i class="fa <?php echo $fileInfo['icon_class']; ?> tx-24 tx-warning lh-0 valign-middle fa-fw"></i>
                                    <span class="pd-l-5"><?php echo $name; ?></span>
                                </span>
                              </a>
                                </td>
                                <td class="file-size text-right">
                                    <?php echo $fileInfo['file_size']; ?>
                                </td>

                                <td class="file-modified text-right">
                                    <?php echo $fileInfo['mod_time']; ?>
                                </td>

                             </tr>
                <?php endforeach; ?>

    </tbody>
